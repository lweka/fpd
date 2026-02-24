<?php
declare(strict_types=1);

require_once __DIR__ . '/../../includes/news.php';

final class NewsModel
{
    public function latest(int $limit = 3): array
    {
        return get_latest_posts($limit);
    }

    public function search(?string $category = null, string $query = '', int $limit = 30): array
    {
        return search_posts($category, $query, $limit);
    }

    public function findBySlug(string $slug): ?array
    {
        return get_post_by_slug($slug);
    }

    public function related(string $category, string $slug, int $limit = 3): array
    {
        return get_related_posts($category, $slug, $limit);
    }
}
