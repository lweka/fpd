<?php
declare(strict_types=1);

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/helpers.php';

function allowed_categories(): array
{
    return ['communique', 'terrain', 'formation', 'mobilisation'];
}

function fallback_posts(): array
{
    return [
        [
            'id' => 0,
            'title' => 'Lancement de la tournée citoyenne nationale',
            'slug' => 'tournee-citoyenne-nationale',
            'excerpt' => 'Rencontres régionales pour recueillir les priorités des populations.',
            'content' => 'Le FPD déploie une série de rencontres citoyennes sur tout le territoire pour renforcer le dialogue local.',
            'image_path' => 'autorite.jpeg',
            'category' => 'terrain',
            'status' => 'published',
            'published_at' => date('Y-m-d H:i:s'),
            'author_name' => 'Direction Communication',
        ],
        [
            'id' => 0,
            'title' => 'Session de formation des jeunes cadres',
            'slug' => 'formation-jeunes-cadres',
            'excerpt' => 'Un programme pour préparer la relève politique du parti.',
            'content' => 'L’académie politique du FPD propose des modules de leadership public et de gouvernance.',
            'image_path' => 'secretaire-generale.jpg',
            'category' => 'formation',
            'status' => 'published',
            'published_at' => date('Y-m-d H:i:s', strtotime('-2 days')),
            'author_name' => 'Direction Formation',
        ],
        [
            'id' => 0,
            'title' => 'Communiqué sur la cohésion nationale',
            'slug' => 'communique-cohesion-nationale',
            'excerpt' => 'Le parti appelle à un dialogue responsable et constructif.',
            'content' => 'Le FPD invite toutes les forces sociales et politiques à privilégier la stabilité et le développement.',
            'image_path' => 'lgo_desing.png',
            'category' => 'communique',
            'status' => 'published',
            'published_at' => date('Y-m-d H:i:s', strtotime('-4 days')),
            'author_name' => 'Secrétariat général',
        ],
    ];
}

function can_use_database(): bool
{
    try {
        db();
        return true;
    } catch (Throwable $exception) {
        return false;
    }
}

function get_latest_posts(int $limit = 3): array
{
    if ($limit <= 0) {
        $limit = 3;
    }

    try {
        $pdo = db();
        $stmt = $pdo->prepare(
            'SELECT id, title, slug, excerpt, content, image_path, category, status, published_at, author_name
             FROM news_posts
             WHERE status = :status
             ORDER BY published_at DESC
             LIMIT ' . (int) $limit
        );
        $stmt->execute(['status' => 'published']);
        $rows = $stmt->fetchAll();

        if (!empty($rows)) {
            return $rows;
        }
    } catch (Throwable $exception) {
        // Fallback to local dataset when DB is not ready.
    }

    return array_slice(fallback_posts(), 0, $limit);
}

function search_posts(?string $category = null, string $query = '', int $limit = 30): array
{
    $query = trim($query);
    if ($limit <= 0) {
        $limit = 30;
    }

    try {
        $pdo = db();
        $sql = 'SELECT id, title, slug, excerpt, content, image_path, category, status, published_at, author_name
                FROM news_posts
                WHERE status = :status';

        $params = ['status' => 'published'];

        if ($category !== null && in_array($category, allowed_categories(), true)) {
            $sql .= ' AND category = :category';
            $params['category'] = $category;
        }

        if ($query !== '') {
            $sql .= ' AND (title LIKE :q OR excerpt LIKE :q OR content LIKE :q)';
            $params['q'] = '%' . $query . '%';
        }

        $sql .= ' ORDER BY published_at DESC LIMIT ' . (int) $limit;

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    } catch (Throwable $exception) {
        $data = fallback_posts();

        if ($category !== null && in_array($category, allowed_categories(), true)) {
            $data = array_values(array_filter($data, function ($item) use ($category) {
                return ($item['category'] ?? '') === $category;
            }));
        }

        if ($query !== '') {
            $queryLower = str_lower($query);
            $data = array_values(array_filter($data, function ($item) use ($queryLower) {
                $hay = (string) (($item['title'] ?? '') . ' ' . ($item['excerpt'] ?? '') . ' ' . ($item['content'] ?? ''));
                return str_contains_ci($hay, $queryLower);
            }));
        }

        return array_slice($data, 0, $limit);
    }
}

function get_post_by_slug(string $slug): ?array
{
    $slug = trim($slug);
    if ($slug === '') {
        return null;
    }

    try {
        $pdo = db();
        $stmt = $pdo->prepare(
            'SELECT id, title, slug, excerpt, content, image_path, category, status, published_at, author_name
             FROM news_posts
             WHERE slug = :slug AND status = :status
             LIMIT 1'
        );
        $stmt->execute(['slug' => $slug, 'status' => 'published']);
        $row = $stmt->fetch();

        return $row ?: null;
    } catch (Throwable $exception) {
        foreach (fallback_posts() as $post) {
            if (($post['slug'] ?? '') === $slug) {
                return $post;
            }
        }

        return null;
    }
}

function get_related_posts(string $category, string $slug, int $limit = 3): array
{
    if ($limit <= 0) {
        $limit = 3;
    }

    try {
        $pdo = db();
        $stmt = $pdo->prepare(
            'SELECT id, title, slug, excerpt, image_path, category, published_at
             FROM news_posts
             WHERE status = :status
             AND category = :category
             AND slug <> :slug
             ORDER BY published_at DESC
             LIMIT ' . (int) $limit
        );
        $stmt->execute([
            'status' => 'published',
            'category' => $category,
            'slug' => $slug,
        ]);

        return $stmt->fetchAll();
    } catch (Throwable $exception) {
        $items = array_values(array_filter(fallback_posts(), function ($item) use ($category, $slug) {
            return ($item['category'] ?? '') === $category && ($item['slug'] ?? '') !== $slug;
        }));

        return array_slice($items, 0, $limit);
    }
}

function ensure_unique_slug(PDO $pdo, string $baseSlug, ?int $excludeId = null): string
{
    $slug = $baseSlug;
    $counter = 1;

    while (true) {
        $sql = 'SELECT id FROM news_posts WHERE slug = :slug';
        $params = ['slug' => $slug];

        if ($excludeId !== null) {
            $sql .= ' AND id <> :id';
            $params['id'] = $excludeId;
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        if (!$stmt->fetch()) {
            return $slug;
        }

        $counter++;
        $slug = $baseSlug . '-' . $counter;
    }
}

function admin_find_user(string $username): ?array
{
    $username = trim($username);
    if ($username === '') {
        return null;
    }

    $pdo = db();
    $stmt = $pdo->prepare('SELECT id, username, password_hash, full_name FROM admin_users WHERE username = :username LIMIT 1');
    $stmt->execute(['username' => $username]);
    $row = $stmt->fetch();

    return $row ?: null;
}

function admin_list_posts(): array
{
    $pdo = db();
    $stmt = $pdo->query(
        'SELECT id, title, slug, category, status, published_at, author_name, created_at
         FROM news_posts
         ORDER BY published_at DESC, created_at DESC'
    );

    return $stmt->fetchAll();
}

function admin_get_post(int $id): ?array
{
    if ($id <= 0) {
        return null;
    }

    $pdo = db();
    $stmt = $pdo->prepare(
        'SELECT id, title, slug, excerpt, content, image_path, category, status, published_at, author_name
         FROM news_posts
         WHERE id = :id
         LIMIT 1'
    );
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();

    return $row ?: null;
}

function admin_create_post(array $data): int
{
    $pdo = db();
    $baseSlug = slugify((string) ($data['title'] ?? 'actualite'));
    $slug = ensure_unique_slug($pdo, $baseSlug);

    $stmt = $pdo->prepare(
        'INSERT INTO news_posts
         (title, slug, excerpt, content, image_path, category, status, published_at, author_name)
         VALUES
         (:title, :slug, :excerpt, :content, :image_path, :category, :status, :published_at, :author_name)'
    );

    $stmt->execute([
        'title' => (string) ($data['title'] ?? ''),
        'slug' => $slug,
        'excerpt' => (string) ($data['excerpt'] ?? ''),
        'content' => (string) ($data['content'] ?? ''),
        'image_path' => (string) ($data['image_path'] ?? ''),
        'category' => (string) ($data['category'] ?? 'communique'),
        'status' => (string) ($data['status'] ?? 'draft'),
        'published_at' => (string) ($data['published_at'] ?? date('Y-m-d H:i:s')),
        'author_name' => (string) ($data['author_name'] ?? 'FPD'),
    ]);

    return (int) $pdo->lastInsertId();
}

function admin_update_post(int $id, array $data): bool
{
    if ($id <= 0) {
        return false;
    }

    $pdo = db();
    $baseSlug = slugify((string) ($data['title'] ?? 'actualite'));
    $slug = ensure_unique_slug($pdo, $baseSlug, $id);

    $stmt = $pdo->prepare(
        'UPDATE news_posts
         SET title = :title,
             slug = :slug,
             excerpt = :excerpt,
             content = :content,
             image_path = :image_path,
             category = :category,
             status = :status,
             published_at = :published_at,
             author_name = :author_name
         WHERE id = :id'
    );

    return $stmt->execute([
        'id' => $id,
        'title' => (string) ($data['title'] ?? ''),
        'slug' => $slug,
        'excerpt' => (string) ($data['excerpt'] ?? ''),
        'content' => (string) ($data['content'] ?? ''),
        'image_path' => (string) ($data['image_path'] ?? ''),
        'category' => (string) ($data['category'] ?? 'communique'),
        'status' => (string) ($data['status'] ?? 'draft'),
        'published_at' => (string) ($data['published_at'] ?? date('Y-m-d H:i:s')),
        'author_name' => (string) ($data['author_name'] ?? 'FPD'),
    ]);
}

function admin_delete_post(int $id): bool
{
    if ($id <= 0) {
        return false;
    }

    $pdo = db();
    $stmt = $pdo->prepare('DELETE FROM news_posts WHERE id = :id');
    return $stmt->execute(['id' => $id]);
}
