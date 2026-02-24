<?php
declare(strict_types=1);

final class ErrorController
{
    public function notFound(): void
    {
        http_response_code(404);

        $pageTitle = 'Page introuvable | FPD';
        $metaDescription = 'La page demandee est introuvable.';
        $activePage = '';

        require __DIR__ . '/../../includes/header.php';
        ?>
        <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= e(app_path('images/bg_1.jpg')) ?>');">
          <div class="overlay"></div>
          <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
              <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">404</h1>
                <p class="breadcrumbs">
                  <span class="mr-2"><a href="<?= e(page_url('home')) ?>">Accueil <i class="ion-ios-arrow-forward"></i></a></span>
                  <span>Page introuvable <i class="ion-ios-arrow-forward"></i></span>
                </p>
              </div>
            </div>
          </div>
        </section>

        <section class="ftco-section bg-light">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8 text-center">
                <h2 class="mb-3">Cette page n'existe pas.</h2>
                <p>Verifiez l'adresse ou revenez a l'accueil.</p>
                <p class="mt-4"><a href="<?= e(page_url('home')) ?>" class="btn btn-primary px-4 py-3">Retour a l'accueil</a></p>
              </div>
            </div>
          </div>
        </section>
        <?php
        require __DIR__ . '/../../includes/footer.php';
    }
}
