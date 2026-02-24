<?php
declare(strict_types=1);

$pageTitle = 'Mobilisation | FPD';
$metaDescription = 'Adhesion, engagement citoyen et implantation provinciale du FPD.';
$activePage = 'mobilisation';

$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = true;
}

require __DIR__ . '/includes/header.php';

$representedProvinces = fpd_represented_provinces();
$provinceNotes = [
    'kinshasa' => 'Siege national et coordination generale.',
    'kongo-central' => 'Organisation federale active autour de Matadi.',
    'kasai-oriental' => 'Relais territorial et mobilisation des sections locales.',
    'haut-katanga' => 'Animation politique et coordination militante a Lubumbashi.',
    'nord-kivu' => 'Implantation active avec dynamique jeunesse a Goma.',
];
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= e(app_path('images/bg_5.jpg')) ?>');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Mobilisation</h1>
        <p class="breadcrumbs">
          <span class="mr-2"><a href="<?= e(page_url('home')) ?>">Accueil <i class="ion-ios-arrow-forward"></i></a></span>
          <span>Mobilisation <i class="ion-ios-arrow-forward"></i></span>
        </p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-7 ftco-animate">
        <div class="wrapper p-4">
          <h3>Formulaire d adhesion</h3>
          <p>L adhesion au FPD se fait par formulaire, puis par l engagement regulier dans les reunions, activites et cotisations du Parti.</p>
          <?php if ($success): ?>
            <div class="alert alert-success">Merci. Votre demande a ete enregistree. L equipe d implantation vous contactera.</div>
          <?php endif; ?>
          <form method="post">
            <div class="form-group">
              <label>Nom complet</label>
              <input type="text" name="full_name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Telephone</label>
              <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Province</label>
              <input type="text" name="province" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Ville / Territoire</label>
              <input type="text" name="city" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Motivation</label>
              <textarea name="message" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
              <button class="btn btn-primary py-3 px-5" type="submit">Rejoindre le mouvement</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-5 ftco-animate">
        <div class="wrapper p-4 mb-4">
          <h3>Repere statutaire</h3>
          <p>Le Parti vit des cotisations regulieres de ses membres. Les contributions financieres sont tracees et controlees a chaque niveau organisationnel.</p>
          <p>Les membres elus, mandataires et promus contribuent selon les references internes arretees par les textes du Parti.</p>
          <p class="section-slogan">DISCIPLINE - TRANSPARENCE - RESULTATS</p>
        </div>
        <div class="wrapper p-4">
          <h3>Equipes de terrain</h3>
          <ul class="mb-0">
            <li>Cellules de quartier et sections communales</li>
            <li>Federations territoriales et urbaines</li>
            <li>Interfederations provinciales</li>
            <li>Ligue des femmes et ligue des jeunes</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section" id="fpd-provinces">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-9 text-center heading-section ftco-animate">
        <h2 class="mb-4">FPD en province</h2>
        <p>Provinces actuellement representees sur nos structures actives.</p>
      </div>
    </div>
    <div class="row">
      <?php foreach ($representedProvinces as $province): ?>
        <?php
        $slug = (string) ($province['slug'] ?? 'province');
        $name = (string) ($province['name'] ?? 'Province');
        $city = (string) ($province['city'] ?? '');
        $note = (string) ($provinceNotes[$slug] ?? 'Structure locale en cours de consolidation.');
        ?>
        <div class="col-md-6 col-lg-4 ftco-animate province-anchor" id="<?= e('province-' . $slug) ?>">
          <div class="course mb-4">
            <div class="text p-4">
              <h3><?= e($name) ?></h3>
              <p><strong>Ville de reference:</strong> <?= e($city) ?></p>
              <p><?= e($note) ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>