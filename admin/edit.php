<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/news.php';
require_once __DIR__ . '/../includes/auth.php';

require_admin_auth();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$isEdit = $id > 0;
$dbError = '';
$errors = [];

$form = [
    'title' => '',
    'excerpt' => '',
    'content' => '',
    'image_path' => '',
    'category' => 'communique',
    'status' => 'published',
    'published_at' => date('Y-m-d\TH:i'),
    'author_name' => (string) (admin_user()['full_name'] ?? admin_user()['username'] ?? 'FPD'),
];

if ($isEdit) {
    try {
        $existing = admin_get_post($id);
        if ($existing === null) {
            set_flash('error', 'Actualité introuvable.');
            header('Location: ' . page_url('admin_home'));
            exit;
        }

        $form = [
            'title' => (string) $existing['title'],
            'excerpt' => (string) ($existing['excerpt'] ?? ''),
            'content' => (string) ($existing['content'] ?? ''),
            'image_path' => (string) ($existing['image_path'] ?? ''),
            'category' => (string) ($existing['category'] ?? 'communique'),
            'status' => (string) ($existing['status'] ?? 'published'),
            'published_at' => date('Y-m-d\TH:i', strtotime((string) ($existing['published_at'] ?? 'now'))),
            'author_name' => (string) ($existing['author_name'] ?? 'FPD'),
        ];
    } catch (Throwable $exception) {
        $dbError = 'Connexion à la base impossible.';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrfToken = isset($_POST['csrf_token']) ? (string) $_POST['csrf_token'] : '';
    if (!verify_csrf($csrfToken)) {
        $errors[] = 'Session invalide. Rechargez la page.';
    }

    $form['title'] = trim((string) ($_POST['title'] ?? ''));
    $form['excerpt'] = trim((string) ($_POST['excerpt'] ?? ''));
    $form['content'] = trim((string) ($_POST['content'] ?? ''));
    $form['image_path'] = trim((string) ($_POST['image_path'] ?? ''));
    $form['category'] = trim((string) ($_POST['category'] ?? 'communique'));
    $form['status'] = trim((string) ($_POST['status'] ?? 'draft'));
    $form['author_name'] = trim((string) ($_POST['author_name'] ?? 'FPD'));
    $publishedInput = trim((string) ($_POST['published_at'] ?? ''));

    if ($form['title'] === '') {
        $errors[] = 'Le titre est obligatoire.';
    }
    if ($form['content'] === '') {
        $errors[] = 'Le contenu est obligatoire.';
    }
    if (!in_array($form['category'], allowed_categories(), true)) {
        $errors[] = 'Catégorie invalide.';
    }
    if (!in_array($form['status'], ['draft', 'published'], true)) {
        $errors[] = 'Statut invalide.';
    }

    $timestamp = strtotime($publishedInput);
    if ($timestamp === false) {
        $timestamp = time();
    }
    $dbPublishedAt = date('Y-m-d H:i:s', $timestamp);
    $form['published_at'] = date('Y-m-d\TH:i', $timestamp);

    if (isset($_FILES['image_file']) && is_array($_FILES['image_file']) && (int) ($_FILES['image_file']['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
        $upload = $_FILES['image_file'];
        $uploadError = (int) ($upload['error'] ?? UPLOAD_ERR_NO_FILE);

        if ($uploadError === UPLOAD_ERR_OK) {
            $tmpName = (string) ($upload['tmp_name'] ?? '');
            $originalName = (string) ($upload['name'] ?? '');
            $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array($ext, $allowed, true)) {
                $errors[] = 'Image invalide. Formats acceptés : jpg, jpeg, png, webp.';
            } else {
                $uploadDir = __DIR__ . '/../uploads/news';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0775, true);
                }

                $filename = date('YmdHis') . '-' . bin2hex(random_bytes(4)) . '.' . $ext;
                $destination = $uploadDir . '/' . $filename;

                if (!move_uploaded_file($tmpName, $destination)) {
                    $errors[] = 'Échec de l’upload de l’image.';
                } else {
                    $form['image_path'] = 'uploads/news/' . $filename;
                }
            }
        } else {
            $errors[] = 'Erreur upload image (code ' . $uploadError . ').';
        }
    }

    if (empty($errors)) {
        try {
            $payload = [
                'title' => $form['title'],
                'excerpt' => $form['excerpt'],
                'content' => $form['content'],
                'image_path' => $form['image_path'],
                'category' => $form['category'],
                'status' => $form['status'],
                'published_at' => $dbPublishedAt,
                'author_name' => $form['author_name'],
            ];

            if ($isEdit) {
                admin_update_post($id, $payload);
                set_flash('success', 'Actualité mise à jour.');
            } else {
                $newId = admin_create_post($payload);
                $id = $newId;
                $isEdit = true;
                set_flash('success', 'Actualité créée avec succès.');
            }

            header('Location: ' . page_url('admin_home'));
            exit;
        } catch (Throwable $exception) {
            $dbError = 'Erreur de sauvegarde. Vérifiez la base MySQL.';
        }
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $isEdit ? 'Modifier actualité' : 'Nouvelle actualité' ?> | FPD</title>
  <link rel="stylesheet" href="<?= e(app_path('css/bootstrap.min.css')) ?>">
  <link rel="stylesheet" href="<?= e(app_path('css/fpd-theme.css')) ?>">
</head>
<body class="admin-shell">
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h3 mb-0"><?= $isEdit ? 'Modifier actualité' : 'Nouvelle actualité' ?></h1>
      <div>
        <a href="<?= e(page_url('admin_home')) ?>" class="btn btn-outline-gold">Retour à la liste</a>
      </div>
    </div>

    <?php if (!empty($errors)): ?>
      <div class="alert alert-danger">
        <?php foreach ($errors as $message): ?>
          <div><?= e($message) ?></div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <?php if ($dbError !== ''): ?>
      <div class="alert alert-warning"><?= e($dbError) ?></div>
    <?php endif; ?>

    <div class="card admin-card">
      <div class="card-body">
        <form method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="title">Titre</label>
              <input id="title" name="title" type="text" class="form-control" required value="<?= e($form['title']) ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="category">Catégorie</label>
              <select id="category" name="category" class="form-control">
                <?php foreach (allowed_categories() as $option): ?>
                  <option value="<?= e($option) ?>" <?= $form['category'] === $option ? 'selected' : '' ?>><?= e(category_label($option)) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="author_name">Auteur</label>
              <input id="author_name" name="author_name" type="text" class="form-control" value="<?= e($form['author_name']) ?>">
            </div>
            <div class="form-group col-md-3">
              <label for="status">Statut</label>
              <select id="status" name="status" class="form-control">
                <option value="draft" <?= $form['status'] === 'draft' ? 'selected' : '' ?>>Brouillon</option>
                <option value="published" <?= $form['status'] === 'published' ? 'selected' : '' ?>>Publié</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="published_at">Date de publication</label>
              <input id="published_at" name="published_at" type="datetime-local" class="form-control" value="<?= e($form['published_at']) ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="excerpt">Résumé</label>
            <textarea id="excerpt" name="excerpt" rows="3" class="form-control"><?= e($form['excerpt']) ?></textarea>
          </div>

          <div class="form-group">
            <label for="content">Contenu</label>
            <textarea id="content" name="content" rows="10" class="form-control" required><?= e($form['content']) ?></textarea>
          </div>

          <div class="form-group">
            <label for="image_path">Chemin image (ex: uploads/news/image.jpg)</label>
            <input id="image_path" name="image_path" type="text" class="form-control" value="<?= e($form['image_path']) ?>">
          </div>

          <div class="form-group">
            <label for="image_file">Ou téléverser une image</label>
            <input id="image_file" name="image_file" type="file" class="form-control-file" accept=".jpg,.jpeg,.png,.webp">
            <small class="form-text text-muted">Le téléversement mettra à jour automatiquement le chemin de l’image.</small>
          </div>

          <?php if ($form['image_path'] !== ''): ?>
            <div class="form-group">
              <img src="<?= e(media_url($form['image_path'])) ?>" alt="Apercu image" style="max-width: 360px; width: 100%; border-radius: 8px;">
            </div>
          <?php endif; ?>

          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
