<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/news.php';
require_once __DIR__ . '/../includes/auth.php';

if (is_admin_logged_in()) {
    header('Location: ' . page_url('admin_home'));
    exit;
}

$error = '';
$dbError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrfToken = isset($_POST['csrf_token']) ? (string) $_POST['csrf_token'] : '';
    $username = trim((string) ($_POST['username'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');

    if (!verify_csrf($csrfToken)) {
        $error = 'Session invalide. Rechargez la page.';
    } elseif ($username === '' || $password === '') {
        $error = 'Veuillez saisir le nom d’utilisateur et le mot de passe.';
    } else {
        try {
            $user = admin_find_user($username);
            if ($user !== null && password_verify($password, (string) $user['password_hash'])) {
                login_admin($user);
                set_flash('success', 'Connexion réussie.');
                header('Location: ' . page_url('admin_home'));
                exit;
            }
            $error = 'Identifiants invalides.';
        } catch (Throwable $exception) {
            $dbError = 'Connexion à la base impossible. Vérifiez votre configuration MySQL.';
        }
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connexion admin | FPD</title>
  <link rel="stylesheet" href="<?= e(app_path('css/bootstrap.min.css')) ?>">
  <link rel="stylesheet" href="<?= e(app_path('css/fpd-theme.css')) ?>">
</head>
<body class="admin-shell d-flex align-items-center">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="card admin-card">
          <div class="card-body p-4">
            <h1 class="h4 mb-3">Espace administration</h1>
            <p class="mb-4">Publication des actualités FPD</p>

            <?php if ($error !== ''): ?>
              <div class="alert alert-danger"><?= e($error) ?></div>
            <?php endif; ?>
            <?php if ($dbError !== ''): ?>
              <div class="alert alert-warning"><?= e($dbError) ?></div>
            <?php endif; ?>

            <form method="post">
              <?= csrf_field() ?>
              <div class="form-group">
                <label for="username">Nom d’utilisateur</label>
                <input id="username" name="username" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Mot de passe</label>
                <input id="password" name="password" type="password" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
            </form>

            <hr>
            <p class="mb-0">
              <a href="<?= e(page_url('home')) ?>">Retour au site</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
