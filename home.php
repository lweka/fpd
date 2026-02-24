<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/news.php';

$pageTitle = 'FPD | Accueil';
$metaDescription = 'Site officiel de la Force Populaire des Democrates : statuts, programme, actualites et mobilisation.';
$activePage = 'home';
$latestPosts = get_latest_posts(3);
$heroSlides = [
    [
        'title' => 'Identite statutaire',
        'subtitle' => 'SOCIAL-DEMOCRATIE ET PATRIOTISME RENOVATEUR',
        'text' => 'Le FPD agit sur base des statuts et du reglement interieur adoptes en mai 2025.',
        'slogan' => 'UNITE - TRAVAIL - DEVELOPPEMENT',
        'button_label' => 'Lire le programme',
        'button_link' => page_url('programme'),
    ],
    [
        'title' => 'Siege national',
        'subtitle' => 'LIMETE - KINSHASA',
        'text' => 'Avenue Tropiques N 551, 7e Rue, Quartier Residentiel. Un centre de coordination pour l action nationale.',
        'slogan' => 'ORGANISATION - DISCIPLINE - PROXIMITE',
        'button_label' => 'Decouvrir le parti',
        'button_link' => page_url('parti'),
    ],
    [
        'title' => 'Implantation provinciale',
        'subtitle' => 'INTERFEDERATIONS ET FEDERATIONS',
        'text' => 'Le Parti est structure du niveau national jusqu a la cellule pour organiser durablement la mobilisation citoyenne.',
        'slogan' => 'MOBILISATION - FORMATION - ACTION',
        'button_label' => 'FPD en province',
        'button_link' => page_url('mobilisation') . '#fpd-provinces',
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
        <h2 class="mb-2">Reperes institutionnels</h2>
        <p>Informations officielles tirees des Statuts amendes et du Reglement d ordre interieur du FPD.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 ftco-animate">
        <div class="course h-100">
          <div class="text p-4">
            <h3>Ideologie</h3>
            <p>La social-democratie : participation du peuple aux decisions, concurrence loyale et justice sociale.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="course h-100">
          <div class="text p-4">
            <h3>Doctrine</h3>
            <p>Le patriotisme renovateur : souverainete nationale, reformes progressives et responsabilite publique.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="course h-100">
          <div class="text p-4">
            <h3>Rayon d action</h3>
            <p>Le FPD exerce ses activites sur toute l etendue de la RDC, avec extension possible dans la diaspora.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12 text-center ftco-animate">
        <a href="<?= e(page_url('parti')) ?>" class="btn btn-primary px-4 py-3 mr-2">Base statutaire du parti</a>
        <a href="<?= e(page_url('mobilisation') . '#fpd-provinces') ?>" class="btn btn-outline-gold px-4 py-3">Voir les provinces representees</a>
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
            <h3 class="heading">Unite nationale</h3>
            <p>Consolider la cohesion du peuple congolais dans toutes les provinces.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-darken">
        <div class="media block-6 d-block text-center">
          <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-reading"></span></div>
          <div class="media-body p-2 mt-3">
            <h3 class="heading">Travail</h3>
            <p>Promouvoir les competences, la discipline et l efficacite dans l action publique.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-primary">
        <div class="media block-6 d-block text-center">
          <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-books"></span></div>
          <div class="media-body p-2 mt-3">
            <h3 class="heading">Developpement</h3>
            <p>Des politiques concretes pour l education, l economie et les infrastructures.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-darken">
        <div class="media block-6 d-block text-center">
          <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-jigsaw"></span></div>
          <div class="media-body p-2 mt-3">
            <h3 class="heading">Bonne gouvernance</h3>
            <p>Transparence, redevabilite et participation citoyenne a tous les niveaux.</p>
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
        <h2 class="mb-4">Force Populaire des Democrates</h2>
        <p>Le FPD prepare la conquete democratique du pouvoir par les elections et l organisation de ses structures de base.</p>
        <p>Sa vision est de batir un Congo fort et uni, avec une redistribution equilibree des richesses et le respect des droits sociaux et environnementaux.</p>
        <p><a href="<?= e(page_url('parti')) ?>" class="btn btn-primary">Decouvrir le parti</a></p>
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
                <span>Adherents mobilises</span>
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
                <span>Axes prioritaires</span>
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
        <h2 class="mb-4">Actualites a la une</h2>
        <p>Suivez les communiques, actions de terrain et initiatives du Parti.</p>
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
              <h3 class="heading"><a href="<?= e(article_url((string) ($post['slug'] ?? ''))) ?>"><?= e((string) ($post['title'] ?? 'Actualite')) ?></a></h3>
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
      <a href="<?= e(page_url('actualites')) ?>" class="btn btn-primary">Voir toutes les actualites</a>
    </div>
  </div>
</section>

<section class="ftco-section testimony-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate">
        <h2 class="mb-4">Temoignages militants</h2>
        <p>La base militante reste le moteur de l engagement national du FPD.</p>
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
                <p>Notre discipline interne renforce la confiance des citoyens dans l action politique.</p>
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
                <p>Le cadre statutaire du Parti clarifie les responsabilites a tous les niveaux organisationnels.</p>
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
                <p>Unite, travail et developpement ne sont pas des slogans, mais un cadre d action concret.</p>
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