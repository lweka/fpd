<?php
declare(strict_types=1);

$pageTitle = 'Le Parti | FPD';
$metaDescription = 'Identite statutaire, mission, organes et categories de membres de la Force Populaire des Democrates.';
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
        <h2 class="mb-4">Identite statutaire du FPD</h2>
        <p>Le FPD est un parti social-democrate qui place la participation citoyenne et la justice sociale au coeur de son action publique.</p>
        <p>Sa doctrine est le patriotisme renovateur : reformer l Etat et proteger la souverainete nationale avec une gouvernance moderne et responsable.</p>
        <p>Siege national : Avenue Tropiques N 551, 7e Rue, Quartier Residentiel, Commune de Limete, Kinshasa.</p>
        <p class="section-slogan">UNITE - TRAVAIL - DEVELOPPEMENT</p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-9 text-center heading-section ftco-animate">
        <h2 class="mb-4">Mission politique</h2>
        <p>Les statuts et le reglement interieur fixent une mission claire de transformation nationale.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 ftco-animate">
        <div class="wrapper p-4 h-100">
          <ul class="mb-0">
            <li>Reformer le systeme educatif.</li>
            <li>Promouvoir le travail et les competences.</li>
            <li>Consolider l Etat de droit et la participation citoyenne.</li>
            <li>Construire une economie moderne et productive.</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 ftco-animate">
        <div class="wrapper p-4 h-100">
          <ul class="mb-0">
            <li>Renforcer le rayonnement culturel, scientifique et sportif.</li>
            <li>Lutter contre la corruption, le nepotisme et l hegemonie tribale.</li>
            <li>Promouvoir la bonne gouvernance et la redevabilite.</li>
            <li>Respecter les instruments internationaux ratifies par la RDC.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-9 text-center heading-section ftco-animate">
        <h2 class="mb-4">Organisation et fonctionnement</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 ftco-animate">
        <div class="course">
          <div class="text p-4">
            <h3>Organes principaux</h3>
            <p>Congres, Direction Politique Nationale, Secretariat Executif National, Conseil National, Interfederation, Federation, Section, Sous-section et Cellule.</p>
            <p>Le Parti est represente en province par les presidents des interfederations et des federations.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 ftco-animate">
        <div class="course">
          <div class="text p-4">
            <h3>Branches specialisees</h3>
            <p>Ligue nationale des femmes, ligue nationale des jeunes, commission de discipline, commission electorale, commission de controle financier, bureau d etudes et strategies, comite economique social et culturel.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 ftco-animate">
        <div class="course mt-4 mt-lg-0">
          <div class="text p-4">
            <h3>Categories de membres</h3>
            <p>Membres fondateurs, membres effectifs, membres sympathisants et membres d honneur. L adhesion se fait par formulaire, carte de membre, cotisations regulieres et participation active.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 ftco-animate">
        <div class="course mt-4 mt-lg-0">
          <div class="text p-4">
            <h3>Discipline financiere</h3>
            <p>Le Parti vit des cotisations de ses membres. Les cotisations sont mensuelles, tracees et controlees. Pour les elus, mandataires et promus, la reference statutaire est de 10% du revenu mensuel.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>