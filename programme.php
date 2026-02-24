<?php
declare(strict_types=1);

$pageTitle = 'Programme | FPD';
$metaDescription = 'Programme politique de la Force Populaire des Démocrates.';
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
      <div class="col-md-8 text-center heading-section ftco-animate">
        <h2 class="mb-4">Axes stratégiques</h2>
        <p>Un projet structuré autour de priorités concrètes pour la nation.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="course">
          <div class="text p-4">
            <h3>Gouvernance</h3>
            <p>État efficace, administration moderne, transparence et responsabilité.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="course">
          <div class="text p-4">
            <h3>Économie & emploi</h3>
            <p>Entrepreneuriat local, industrialisation et création d'emplois durables.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="course">
          <div class="text p-4">
            <h3>Jeunesse</h3>
            <p>Formation, insertion professionnelle et leadership citoyen.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="course">
          <div class="text p-4">
            <h3>Éducation</h3>
            <p>Qualité pédagogique, infrastructures scolaires et innovation.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="course">
          <div class="text p-4">
            <h3>Santé</h3>
            <p>Accès aux soins primaires et renforcement des centres de santé.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="course">
          <div class="text p-4">
            <h3>Infrastructures</h3>
            <p>Routes, énergie, eau et numérique pour soutenir la croissance.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12 text-center ftco-animate">
        <p><a href="<?= e(app_path('docs/programme-fpd.pdf')) ?>" class="btn btn-primary px-4 py-3" download>Télécharger le programme PDF</a></p>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
