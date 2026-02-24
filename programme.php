<?php
declare(strict_types=1);

$pageTitle = 'Programme | FPD';
$metaDescription = 'Programme politique du FPD base sur les statuts et le reglement interieur.';
$activePage = 'programme';

require __DIR__ . '/includes/header.php';
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= e(app_path('images/bg_3.jpg')) ?>');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Programme</h1>
        <p class="breadcrumbs">
          <span class="mr-2"><a href="<?= e(page_url('home')) ?>">Accueil <i class="ion-ios-arrow-forward"></i></a></span>
          <span>Programme <i class="ion-ios-arrow-forward"></i></span>
        </p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-9 text-center heading-section ftco-animate">
        <h2 class="mb-4">Axes programmatiques prioritaires</h2>
        <p>Ce cadre d action reprend les engagements fixes dans les documents statutaires du Parti.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="course"><div class="text p-4"><h3>Education et formation</h3><p>Reforme du systeme educatif, qualification professionnelle, insertion des jeunes.</p></div></div>
      </div>
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="course"><div class="text p-4"><h3>Travail et emploi</h3><p>Promotion du travail, soutien a l entrepreneuriat local et organisation du marche de l emploi.</p></div></div>
      </div>
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="course"><div class="text p-4"><h3>Etat de droit</h3><p>Participation citoyenne, acces a la justice, discipline institutionnelle et lutte contre l impunite.</p></div></div>
      </div>
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="course"><div class="text p-4"><h3>Economie moderne</h3><p>Production nationale, concurrence loyale et redistribution equilibree des richesses.</p></div></div>
      </div>
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="course"><div class="text p-4"><h3>Gouvernance et conformite</h3><p>Transparence financiere, controle interne, redevabilite et gestion axee sur les resultats.</p></div></div>
      </div>
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="course"><div class="text p-4"><h3>Cohesion nationale</h3><p>Parite, representativite geopolitique, refus du tribalisme, du nepotisme et de la dictature.</p></div></div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-4">
      <div class="col-md-9 text-center heading-section ftco-animate">
        <h2 class="mb-3">Vision 2026-2031</h2>
        <p>Bâtir un Congo fort et uni ou les droits sociaux et environnementaux sont assures, avec une administration efficace et une economie qui profite aux citoyens.</p>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center ftco-animate">
        <a href="<?= e(page_url('mobilisation')) ?>" class="btn btn-primary px-4 py-3 mr-2">Participer a la mise en oeuvre</a>
        <a href="<?= e(page_url('actualites')) ?>" class="btn btn-outline-gold px-4 py-3">Suivre les actions</a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>