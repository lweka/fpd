<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/news.php';
require_once __DIR__ . '/../includes/auth.php';

require_admin_auth();

$success = get_flash('success');
$error = get_flash('error');
$dbError = '';
$posts = [];

try {
    $posts = admin_list_posts();
} catch (Throwable $exception) {
    $dbError = 'Connexion à la base impossible. Créez la base avec sql/fpd_cms.sql.';
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin actualités | FPD</title>
  <link rel="stylesheet" href="<?= e(app_path('css/bootstrap.min.css')) ?>">
  <link rel="stylesheet" href="<?= e(app_path('css/fpd-theme.css')) ?>">
</head>
<body class="admin-shell">
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h1 class="h3 mb-1">Gestion des actualites</h1>
        <p class="mb-0">Connecté : <?= e((string) (admin_user()['full_name'] ?? admin_user()['username'] ?? 'Admin')) ?></p>
      </div>
      <div>
        <a href="<?= e(page_url('admin_edit')) ?>" class="btn btn-primary">Nouvelle actualité</a>
        <a href="<?= e(page_url('home')) ?>" class="btn btn-outline-gold">Voir le site</a>
        <a href="<?= e(page_url('admin_logout')) ?>" class="btn btn-outline-light">Déconnexion</a>
      </div>
    </div>

    <?php if ($success !== null): ?>
      <div class="alert alert-success"><?= e($success) ?></div>
    <?php endif; ?>
    <?php if ($error !== null): ?>
      <div class="alert alert-danger"><?= e($error) ?></div>
    <?php endif; ?>
    <?php if ($dbError !== ''): ?>
      <div class="alert alert-warning"><?= e($dbError) ?></div>
    <?php endif; ?>

    <div class="card admin-card">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-dark table-striped mb-0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Statut</th>
                <th>Publication</th>
                <th class="text-right">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($posts)): ?>
                <tr>
                  <td colspan="6">Aucune actualité en base.</td>
                </tr>
              <?php endif; ?>
              <?php foreach ($posts as $post): ?>
                <tr>
                  <td><?= e((string) $post['id']) ?></td>
                  <td>
                    <strong><?= e((string) $post['title']) ?></strong><br>
                    <small><?= e((string) $post['slug']) ?></small>
                  </td>
                  <td><?= e(category_label((string) $post['category'])) ?></td>
                  <td>
                    <span class="fpd-pill"><?= e((string) $post['status']) ?></span>
                  </td>
                  <td><?= e(format_date_fr((string) $post['published_at'])) ?></td>
                  <td class="text-right">
                    <a class="btn btn-sm btn-primary" href="<?= e(page_url('admin_edit', ['id' => (int) $post['id']])) ?>">Modifier</a>
                    <a class="btn btn-sm btn-outline-light" href="<?= e(article_url((string) $post['slug'])) ?>" target="_blank" rel="noopener">Voir</a>
                    <form method="post" action="<?= e(page_url('admin_delete')) ?>" class="d-inline">
                      <?= csrf_field() ?>
                      <input type="hidden" name="id" value="<?= e((string) $post['id']) ?>">
                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette actualité ?');">Supprimer</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
