<?php
declare(strict_types=1);

$pageTitle = 'Contact | FPD';
$metaDescription = 'Contact officiel de la Force Populaire des Démocrates.';
$activePage = 'contact';

$sent = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sent = true;
}

require __DIR__ . '/includes/header.php';
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= e(app_path('images/bg_1.jpg')) ?>');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Contact</h1>
        <p class="breadcrumbs">
          <span class="mr-2"><a href="<?= e(page_url('home')) ?>">Accueil <i class="ion-ios-arrow-forward"></i></a></span>
          <span>Contact <i class="ion-ios-arrow-forward"></i></span>
        </p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row d-flex mb-5 contact-info">
      <div class="col-md-3 d-flex">
        <div class="align-self-stretch box p-4 text-center">
          <h3 class="mb-4">Adresse</h3>
          <p>Avenue de la Démocratie, Kinshasa</p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="align-self-stretch box p-4 text-center">
          <h3 class="mb-4">Téléphone</h3>
          <p><a href="tel:+243000000000">+243 000 000 000</a></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="align-self-stretch box p-4 text-center">
          <h3 class="mb-4">Email</h3>
          <p><a href="mailto:contact@fpd.cd">contact@fpd.cd</a></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="align-self-stretch box p-4 text-center">
          <h3 class="mb-4">Slogan</h3>
          <p class="section-slogan">UNITÉ - TRAVAIL - DÉVELOPPEMENT</p>
        </div>
      </div>
    </div>

    <div class="row block-9">
      <div class="col-md-6 order-md-last d-flex">
        <form method="post" class="bg-light p-5 contact-form w-100">
          <?php if ($sent): ?>
            <div class="alert alert-success">Message envoyé. Nous vous répondrons rapidement.</div>
          <?php endif; ?>
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Votre nom" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Votre email" required>
          </div>
          <div class="form-group">
            <input type="text" name="subject" class="form-control" placeholder="Objet">
          </div>
          <div class="form-group">
            <textarea name="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Envoyer" class="btn btn-primary py-3 px-5">
          </div>
        </form>
      </div>
      <div class="col-md-6 d-flex">
        <div class="w-100">
          <iframe
            title="Carte siege FPD"
            src="https://www.openstreetmap.org/export/embed.html?bbox=15.2283%2C-4.444%2C15.3483%2C-4.324&layer=mapnik"
            style="width:100%; min-height: 460px; border:0;"
            loading="lazy"
          ></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
