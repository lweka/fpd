<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/news.php';

$pageTitle = 'FPD | Accueil';
$metaDescription = 'Site officiel de la Force Populaire des Democrates : actualites, programme et mobilisation citoyenne.';
$activePage = 'home';
$latestPosts = get_latest_posts(3);
$heroSlides = [
    [
        'title' => 'ELAN 2026',
        'subtitle' => 'NOUVEL AN, NOUVEL ELAN',
        'text' => 'Vision collective, cohesion nationale et mobilisation responsable pour une action politique courageuse.',
        'slogan' => 'UNITE - TRAVAIL - DEVELOPPEMENT',
        'button_label' => "Programme d'action 2026",
        'button_link' => page_url('programme'),
    ],
    [
        'title' => 'Mobilisation Nationale',
        'subtitle' => 'ENSEMBLE SUR LE TERRAIN',
        'text' => 'Le mouvement se renforce dans toutes les provinces avec une organisation de proximite.',
        'slogan' => 'ACTION - DISCIPLINE - RESULTATS',
        'button_label' => 'Rejoindre la mobilisation',
        'button_link' => page_url('mobilisation'),
    ],
    [
        'title' => 'Priorite Citoyenne',
        'subtitle' => 'LE PROGRAMME EN ACTION',
        'text' => 'Des engagements concrets pour l emploi, l education et la cohesion sociale.',
        'slogan' => 'PROGRES - STABILITE - DEVELOPPEMENT',
        'button_label' => 'Voir les actualites',
        'button_link' => page_url('actualites'),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="home-video-hero">
  <video class="home-video-hero__media" autoplay muted loop playsinline preload="metadata" poster="<?= e(app_path('images/100x710.png')) ?>">
    <source src="<?= e(app_path('videos/bampere.mp4')) ?>" type="video/mp4">
    Votre navigateur ne supporte pas la video HTML5.
  </video>
  <div class="home-video-hero__overlay"></div>
  <div class="container home-video-hero__content">
    <div class="home-video-slider owl-carousel">
      <?php foreach ($heroSlides as $slide): ?>
        <div class="home-video-slide">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
              <h1 class="mb-4"><?= e((string) ($slide['title'] ?? 'FPD')) ?></h1>
              <p class="mb-2"><?= e((string) ($slide['subtitle'] ?? '')) ?></p>
              <p><?= e((string) ($slide['text'] ?? '')) ?></p>
              <p class="section-slogan"><?= e((string) ($slide['slogan'] ?? '')) ?></p>
              <p><a href="<?= e((string) ($slide['button_link'] ?? page_url('programme'))) ?>" class="btn btn-primary px-4 py-3 mt-3"><?= e((string) ($slide['button_label'] ?? 'En savoir plus')) ?></a></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="ftco-section elan-2026-highlight pt-4 pt-md-5">
  <div class="container">
    <div class="row justify-content-center mb-4">
      <div class="col-lg-10 text-center heading-section ftco-animate">
        <h2 class="mb-2">CAP SUR Ã‰LAN 2026</h2>
        <p>Deux visuels officiels de campagne mis en avant pour porter le message national.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-12 ftco-animate">
        <article class="elan-banner-card mb-4">
          <img src="<?= e(app_path('images/100x710.png')) ?>" alt="Visuel officiel FPD Ã‰lan 2026 - vision collective tournÃ©e vers l'avenir" class="elan-banner-img" loading="eager">
        </article>
      </div>
      <div class="col-12 ftco-animate">
        <article class="elan-banner-card">
          <img src="<?= e(app_path('images/150x420.png')) ?>" alt="Visuel officiel FPD Ã‰lan 2026 - programme d'action stratÃ©gique" class="elan-banner-img" loading="lazy">
        </article>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12 text-center ftco-animate">
        <a href="<?= e(page_url('programme')) ?>" class="btn btn-primary px-4 py-3 mr-2">Voir le programme 2026</a>
        <a href="<?= e(page_url('actualites')) ?>" class="btn btn-outline-gold px-4 py-3">Suivre la campagne</a>
      </div>
    </div>
  </div>
</section>

<section class="ftco-services ftco-no-pb">
  <div class="container-wrap">
    <div class="row no-gutters">
      <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-primary">
        <div class="media block-6 d-block text-center">
          <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-diploma"></span></div>
          <div class="media-body p-2 mt-3">
            <h3 class="heading">UnitÃ©</h3>
            <p>Rassembler toutes les Ã©nergies citoyennes autour d'une vision nationale commune.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-darken">
        <div class="media block-6 d-block text-center">
          <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-reading"></span></div>
          <div class="media-body p-2 mt-3">
            <h3 class="heading">Travail</h3>
            <p>Promouvoir la discipline, la compÃ©tence et l'efficacitÃ© dans l'action publique.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-primary">
        <div class="media block-6 d-block text-center">
          <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-books"></span></div>
          <div class="media-body p-2 mt-3">
            <h3 class="heading">DÃ©veloppement</h3>
            <p>Des politiques concrÃ¨tes pour l'emploi, les infrastructures et la cohÃ©sion sociale.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-darken">
        <div class="media block-6 d-block text-center">
          <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-jigsaw"></span></div>
          <div class="media-body p-2 mt-3">
            <h3 class="heading">Mobilisation</h3>
            <p>Un rÃ©seau militant organisÃ© pour transformer les idÃ©es en rÃ©sultats mesurables.</p>
          </div>
        </div>
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
        <h2 class="mb-4">Force Populaire des DÃ©mocrates</h2>
        <p>Le FPD porte une ambition claire : moderniser la gouvernance, renforcer la justice sociale et accÃ©lÃ©rer le dÃ©veloppement territorial.</p>
        <p>Notre action repose sur des structures locales actives, une organisation rigoureuse et une Ã©coute permanente des citoyens.</p>
        <p><a href="<?= e(page_url('parti')) ?>" class="btn btn-primary">DÃ©couvrir le parti</a></p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url('<?= e(app_path('images/bg_3.jpg')) ?>');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row d-md-flex align-items-center justify-content-center">
      <div class="col-lg-12">
        <div class="row d-md-flex align-items-center">
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="icon"><span class="flaticon-doctor"></span></div>
              <div class="text">
                <strong class="number" data-number="125000">0</strong>
                <span>AdhÃ©rents</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="icon"><span class="flaticon-books"></span></div>
              <div class="text">
                <strong class="number" data-number="350">0</strong>
                <span>Actions citoyennes</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="icon"><span class="flaticon-reading"></span></div>
              <div class="text">
                <strong class="number" data-number="26">0</strong>
                <span>Coordinations locales</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="icon"><span class="flaticon-diploma"></span></div>
              <div class="text">
                <strong class="number" data-number="12">0</strong>
                <span>Axes programmatiques</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate">
        <h2 class="mb-4">ActualitÃ©s Ã  la une</h2>
        <p>Suivez les actions, communiquÃ©s et initiatives du parti en temps rÃ©el.</p>
      </div>
    </div>
    <div class="row">
      <?php foreach ($latestPosts as $post): ?>
        <?php
        $imageUrl = media_url($post['image_path'] ?? '', 'images/image_1.jpg');
        $excerpt = trim((string) ($post['excerpt'] ?? ''));
        if ($excerpt === '') {
            $excerpt = make_excerpt((string) ($post['content'] ?? ''));
        }
        ?>
        <div class="col-md-6 col-lg-4 ftco-animate">
          <div class="blog-entry">
            <a href="<?= e(article_url((string) ($post['slug'] ?? ''))) ?>" class="block-20 d-flex align-items-end" style="background-image: url('<?= e($imageUrl) ?>');">
              <div class="meta-date text-center p-2">
                <span class="day"><?= e(date('d', strtotime((string) ($post['published_at'] ?? 'now')))) ?></span>
                <span class="mos"><?= e(date('M', strtotime((string) ($post['published_at'] ?? 'now')))) ?></span>
                <span class="yr"><?= e(date('Y', strtotime((string) ($post['published_at'] ?? 'now')))) ?></span>
              </div>
            </a>
            <div class="text p-4">
              <p class="mb-2"><span class="fpd-pill"><?= e(category_label((string) ($post['category'] ?? 'actualites'))) ?></span></p>
              <h3 class="heading"><a href="<?= e(article_url((string) ($post['slug'] ?? ''))) ?>"><?= e((string) ($post['title'] ?? 'ActualitÃ©')) ?></a></h3>
              <p><?= e($excerpt) ?></p>
              <div class="d-flex align-items-center mt-4">
                <p class="mb-0"><a href="<?= e(article_url((string) ($post['slug'] ?? ''))) ?>" class="btn btn-primary">Lire <span class="ion-ios-arrow-round-forward"></span></a></p>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
      <a href="<?= e(page_url('actualites')) ?>" class="btn btn-primary">Voir toutes les actualitÃ©s</a>
    </div>
  </div>
</section>

<section class="ftco-section testimony-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate">
        <h2 class="mb-4">TÃ©moignages militants</h2>
        <p>La base militante reste le moteur de notre engagement national.</p>
      </div>
    </div>
    <div class="row ftco-animate justify-content-center">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel">
          <div class="item">
            <div class="testimony-wrap d-flex">
              <div class="user-img mr-4" style="background-image: url('<?= e(app_path('secretaire-generale.jpg')) ?>')"></div>
              <div class="text ml-2">
                <span class="quote d-flex align-items-center justify-content-center"><i class="icon-quote-left"></i></span>
                <p>Le FPD nous donne un cadre clair pour agir concrÃ¨tement sur le terrain.</p>
                <p class="name">Militante, Kinshasa</p>
                <span class="position">Section locale</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap d-flex">
              <div class="user-img mr-4" style="background-image: url('<?= e(app_path('autorite.jpeg')) ?>')"></div>
              <div class="text ml-2">
                <span class="quote d-flex align-items-center justify-content-center"><i class="icon-quote-left"></i></span>
                <p>La discipline interne et la proximitÃ© citoyenne font notre force collective.</p>
                <p class="name">Cadre, Lubumbashi</p>
                <span class="position">Coordination provinciale</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap d-flex">
              <div class="user-img mr-4" style="background-image: url('<?= e(app_path('lgo_desing.png')) ?>')"></div>
              <div class="text ml-2">
                <span class="quote d-flex align-items-center justify-content-center"><i class="icon-quote-left"></i></span>
                <p>Notre slogan n'est pas thÃ©orique : unitÃ©, travail et dÃ©veloppement guident nos actions.</p>
                <p class="name">Jeune militant, Goma</p>
                <span class="position">Cellule jeunesse</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
