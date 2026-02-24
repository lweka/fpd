<?php
declare(strict_types=1);

$pageTitle = 'Mobilisation | FPD';
$metaDescription = 'Adhésion, bénévolat et agenda de mobilisation du FPD.';
$activePage = 'mobilisation';

$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = true;
}

require __DIR__ . '/includes/header.php';
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
          <h3>Formulaire d'adhésion</h3>
          <p>Engagez-vous pour renforcer l'action citoyenne du FPD.</p>
          <?php if ($success): ?>
            <div class="alert alert-success">Merci. Votre demande a été enregistrée. L'équipe vous contactera.</div>
          <?php endif; ?>
          <form method="post">
            <div class="form-group">
              <label>Nom complet</label>
              <input type="text" name="full_name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Téléphone</label>
              <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Ville</label>
              <input type="text" name="city" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Motivation</label>
              <textarea name="message" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <button class="btn btn-primary py-3 px-5" type="submit">Rejoignez le mouvement</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-5 ftco-animate">
        <div class="wrapper p-4">
          <h3>Devenir bénévole</h3>
          <p>Participez aux campagnes de terrain et à l'organisation locale.</p>
          <ul>
            <li>Communication communautaire</li>
            <li>Logistique événementielle</li>
            <li>Animation des sections</li>
          </ul>
          <p class="section-slogan">AGISSONS ENSEMBLE</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate">
        <h2 class="mb-4">Calendrier des événements</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 ftco-animate">
        <div class="course">
          <div class="text p-4">
            <h3>18 février 2026</h3>
            <p>Rencontre citoyenne régionale - Dialogue sur les priorités locales.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="course">
          <div class="text p-4">
            <h3>23 février 2026</h3>
            <p>Atelier jeunesse et leadership - Formation des nouveaux cadres.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="course">
          <div class="text p-4">
            <h3>02 mars 2026</h3>
            <p>Forum national des sections locales - Planification trimestrielle.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
