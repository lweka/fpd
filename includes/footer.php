<?php
declare(strict_types=1);
?>
<footer class="ftco-footer ftco-bg-dark ftco-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-6 col-lg-4">
        <div class="ftco-footer-widget mb-5">
          <h2 class="ftco-heading-2">FPD</h2>
          <p>Force Populaire des Democrates</p>
          <p class="footer-slogan">UNITE - TRAVAIL - DEVELOPPEMENT</p>
          <ul class="list-unstyled mt-3 footer-links">
            <li><a href="<?= e(page_url('home')) ?>">Accueil</a></li>
            <li><a href="<?= e(page_url('actualites')) ?>">Actualites</a></li>
            <li><a href="<?= e(page_url('mobilisation')) ?>">Mobilisation</a></li>
            <li><a href="<?= e(page_url('mobilisation') . '#fpd-provinces') ?>">FPD en province</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="ftco-footer-widget mb-5">
          <h2 class="ftco-heading-2">Siege National</h2>
          <div class="block-23 mb-3">
            <ul>
              <li><span class="icon icon-map-marker"></span><span class="text">Avenue Tropiques N 551, 7e Rue, Q. Residentiel, Limete, Kinshasa</span></li>
              <li><a href="tel:+243000000000"><span class="icon icon-phone"></span><span class="text">+243 000 000 000</span></a></li>
              <li><a href="mailto:contact@fpd.cd"><span class="icon icon-envelope"></span><span class="text">contact@fpd.cd</span></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="ftco-footer-widget mb-5">
          <h2 class="ftco-heading-2">Action</h2>
          <p>Le FPD mobilise ses structures pour organiser les membres, former les cadres et preparer les echeances electorales.</p>
          <a href="<?= e(page_url('mobilisation')) ?>" class="btn btn-primary px-3 py-2">Agissons ensemble</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <p class="mb-0">&copy; <?= date('Y') ?> FPD - Tous droits reserves.</p>
      </div>
    </div>
  </div>
</footer>

<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#B8860B"/></svg></div>

<script src="<?= e(app_path('js/jquery.min.js')) ?>"></script>
<script src="<?= e(app_path('js/jquery-migrate-3.0.1.min.js')) ?>"></script>
<script src="<?= e(app_path('js/popper.min.js')) ?>"></script>
<script src="<?= e(app_path('js/bootstrap.min.js')) ?>"></script>
<script src="<?= e(app_path('js/jquery.easing.1.3.js')) ?>"></script>
<script src="<?= e(app_path('js/jquery.waypoints.min.js')) ?>"></script>
<script src="<?= e(app_path('js/jquery.stellar.min.js')) ?>"></script>
<script src="<?= e(app_path('js/owl.carousel.min.js')) ?>"></script>
<script src="<?= e(app_path('js/jquery.magnific-popup.min.js')) ?>"></script>
<script src="<?= e(app_path('js/aos.js')) ?>"></script>
<script src="<?= e(app_path('js/jquery.animateNumber.min.js')) ?>"></script>
<script src="<?= e(app_path('js/scrollax.min.js')) ?>"></script>
<script src="<?= e(app_path('js/main.js')) ?>"></script>
<?php if (!empty($extraScripts) && is_array($extraScripts)): ?>
  <?php foreach ($extraScripts as $scriptTag): ?>
    <?= $scriptTag . PHP_EOL ?>
  <?php endforeach; ?>
<?php endif; ?>
</body>
</html>