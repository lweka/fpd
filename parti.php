<?php
declare(strict_types=1);

$pageTitle = 'Le Parti | FPD';
$metaDescription = 'Histoire, valeurs, bureau exécutif et témoignages de la Force Populaire des Démocrates.';
$activePage = 'parti';

require __DIR__ . '/includes/header.php';
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= e(app_path('images/bg_1.jpg')) ?>');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Le Parti</h1>
        <p class="breadcrumbs">
          <span class="mr-2"><a href="<?= e(page_url('home')) ?>">Accueil <i class="ion-ios-arrow-forward"></i></a></span>
          <span>Le Parti <i class="ion-ios-arrow-forward"></i></span>
        </p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-no-pt ftc-no-pb">
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-5 order-md-last wrap-about d-flex align-items-stretch">
        <div class="img" style="background-image: url('<?= e(app_path('autorite.jpeg')) ?>');"></div>
      </div>
      <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
        <h2 class="mb-4">Une organisation nationale ancrée dans l'action</h2>
        <p>La Force Populaire des Démocrates structure son action autour d'une vision de gouvernance responsable, de justice sociale et de développement durable.</p>
        <p>Le parti agit avec un réseau territorial fort, une discipline organisationnelle et une démarche permanente de proximité citoyenne.</p>
        <p class="section-slogan">UNITÉ - TRAVAIL - DÉVELOPPEMENT</p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate">
        <h2 class="mb-4">Valeurs fondamentales</h2>
        <p>Des principes clairs pour guider l'engagement politique et l'action publique.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="services-2 d-flex">
          <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-security"></span></div>
          <div class="text pl-3">
            <h3>Unité nationale</h3>
            <p>Renforcer la cohésion et le vivre-ensemble dans toutes les provinces.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="services-2 d-flex">
          <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-reading"></span></div>
          <div class="text pl-3">
            <h3>Éthique publique</h3>
            <p>Placer la responsabilité, la transparence et la redevabilité au centre.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="services-2 d-flex">
          <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-diploma"></span></div>
          <div class="text pl-3">
            <h3>Travail</h3>
            <p>Promouvoir la compétence et l'efficacité à chaque niveau d'action.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="services-2 d-flex">
          <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-jigsaw"></span></div>
          <div class="text pl-3">
            <h3>Développement</h3>
            <p>Transformer les priorités populaires en politiques concrètes et mesurables.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate">
        <h2 class="mb-4">Bureau exécutif</h2>
        <p>Une équipe dirigeante engagée pour une action cohérente et performante.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="staff">
          <div class="img-wrap d-flex align-items-stretch">
            <div class="img align-self-stretch" style="background-image: url('<?= e(app_path('autorite.jpeg')) ?>');"></div>
          </div>
          <div class="text pt-3 text-center">
            <h3>Présidence nationale</h3>
            <span class="position mb-2">Coordination stratégique</span>
            <div class="faded">
              <p>Impulse les grandes orientations politiques et représente le parti.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="staff">
          <div class="img-wrap d-flex align-items-stretch">
            <div class="img align-self-stretch" style="background-image: url('<?= e(app_path('secretaire-generale.jpg')) ?>');"></div>
          </div>
          <div class="text pt-3 text-center">
            <h3>Secrétariat général</h3>
            <span class="position mb-2">Pilotage opérationnel</span>
            <div class="faded">
              <p>Coordonne les structures et assure le suivi des activités nationales.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="staff">
          <div class="img-wrap d-flex align-items-stretch">
            <div class="img align-self-stretch" style="background-image: url('<?= e(app_path('lgo_desing.png')) ?>');"></div>
          </div>
          <div class="text pt-3 text-center">
            <h3>Coordination Territoriale</h3>
            <span class="position mb-2">Animation locale</span>
            <div class="faded">
              <p>Développe la mobilisation de terrain et l'ancrage communautaire.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section testimony-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate">
        <h2 class="mb-4">Témoignages militants</h2>
      </div>
    </div>
    <div class="row ftco-animate justify-content-center">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel">
          <div class="item">
            <div class="testimony-wrap d-flex">
              <div class="user-img mr-4" style="background-image: url('<?= e(app_path('autorite.jpeg')) ?>')"></div>
              <div class="text ml-2">
                <span class="quote d-flex align-items-center justify-content-center"><i class="icon-quote-left"></i></span>
                <p>Le FPD est une école de rigueur et de service public.</p>
                <p class="name">Militant, Mbuji-Mayi</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap d-flex">
              <div class="user-img mr-4" style="background-image: url('<?= e(app_path('secretaire-generale.jpg')) ?>')"></div>
              <div class="text ml-2">
                <span class="quote d-flex align-items-center justify-content-center"><i class="icon-quote-left"></i></span>
                <p>Nous sommes fiers d'un parti qui travaille avec la population.</p>
                <p class="name">Militante, Matadi</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap d-flex">
              <div class="user-img mr-4" style="background-image: url('<?= e(app_path('lgo_desing.png')) ?>')"></div>
              <div class="text ml-2">
                <span class="quote d-flex align-items-center justify-content-center"><i class="icon-quote-left"></i></span>
                <p>Unité, travail, développement : c'est une ligne d'action concrète.</p>
                <p class="name">Jeune cadre, Goma</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
