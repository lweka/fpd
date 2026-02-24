<?php
declare(strict_types=1);

require_once __DIR__ . '/helpers.php';

$pageTitle = $pageTitle ?? 'FPD';
$activePage = $activePage ?? '';
$metaDescription = $metaDescription ?? 'Site officiel de la Force Populaire des Démocrates';
$bodyClass = isset($bodyClass) ? trim((string) $bodyClass) : '';

if (!headers_sent()) {
    header('Content-Type: text/html; charset=UTF-8');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= e($pageTitle) ?></title>
  <meta name="description" content="<?= e($metaDescription) ?>">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= e(app_path('css/open-iconic-bootstrap.min.css')) ?>">
  <link rel="stylesheet" href="<?= e(app_path('css/animate.css')) ?>">
  <link rel="stylesheet" href="<?= e(app_path('css/owl.carousel.min.css')) ?>">
  <link rel="stylesheet" href="<?= e(app_path('css/owl.theme.default.min.css')) ?>">
  <link rel="stylesheet" href="<?= e(app_path('css/magnific-popup.css')) ?>">
  <link rel="stylesheet" href="<?= e(app_path('css/aos.css')) ?>">
  <link rel="stylesheet" href="<?= e(app_path('css/ionicons.min.css')) ?>">
  <link rel="stylesheet" href="<?= e(app_path('css/flaticon.css')) ?>">
  <link rel="stylesheet" href="<?= e(app_path('css/icomoon.css')) ?>">
  <link rel="stylesheet" href="<?= e(app_path('css/style.css')) ?>">
  <link rel="stylesheet" href="<?= e(app_path('css/fpd-theme.css')) ?>">
  <?php if (!empty($extraHead) && is_array($extraHead)): ?>
    <?php foreach ($extraHead as $headTag): ?>
      <?= $headTag . PHP_EOL ?>
    <?php endforeach; ?>
  <?php endif; ?>
</head>
<body<?= $bodyClass !== '' ? ' class="' . e($bodyClass) . '"' : '' ?>>
  <div class="bg-top navbar-light">
    <div class="container">
      <div class="row no-gutters d-flex align-items-center align-items-stretch">
        <div class="col-md-4 d-flex align-items-center py-3 py-md-4">
          <a class="navbar-brand d-flex align-items-center" href="<?= e(page_url('home')) ?>">
            <img src="<?= e(app_path('logo2.png')) ?>" alt="Logo FPD" class="brand-logo mr-2">
            <span class="brand-text-wrap">
              FPD <span>Force Populaire des Démocrates</span>
            </span>
          </a>
        </div>
        <div class="col-lg-8 d-block">
          <div class="row d-flex">
            <div class="col-md d-flex topper align-items-center align-items-stretch py-md-3">
              <div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
              <div class="text">
                <span>Email</span>
                <span>contact@fpd.cd</span>
              </div>
            </div>
            <div class="col-md d-flex topper align-items-center align-items-stretch py-md-3">
              <div class="icon d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
              <div class="text">
                <span>Téléphone</span>
                <span>+243 000 000 000</span>
              </div>
            </div>
            <div class="col-md topper d-flex align-items-center justify-content-end">
              <p class="mb-0">
                <a href="<?= e(page_url('mobilisation')) ?>" class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center">
                  <span>Rejoignez le mouvement</span>
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light ftco_navbar" id="ftco-navbar">
    <div class="container d-flex align-items-center px-4">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= e(active_class($activePage, 'home')) ?>"><a href="<?= e(page_url('home')) ?>" class="nav-link pl-0">Accueil</a></li>
          <li class="nav-item <?= e(active_class($activePage, 'parti')) ?>"><a href="<?= e(page_url('parti')) ?>" class="nav-link">Le Parti</a></li>
          <li class="nav-item <?= e(active_class($activePage, 'actualites')) ?>"><a href="<?= e(page_url('actualites')) ?>" class="nav-link">Actualités</a></li>
          <li class="nav-item <?= e(active_class($activePage, 'programme')) ?>"><a href="<?= e(page_url('programme')) ?>" class="nav-link">Programme</a></li>
          <li class="nav-item <?= e(active_class($activePage, 'mobilisation')) ?>"><a href="<?= e(page_url('mobilisation')) ?>" class="nav-link">Mobilisation</a></li>
          <li class="nav-item <?= e(active_class($activePage, 'contact')) ?>"><a href="<?= e(page_url('contact')) ?>" class="nav-link">Contact</a></li>
        </ul>
        <a href="<?= e(page_url('admin_login')) ?>" class="btn btn-sm btn-outline-gold">Espace admin</a>
      </div>
    </div>
  </nav>
