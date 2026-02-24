<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/news.php';

$pageTitle = 'Actualités | FPD';
$metaDescription = 'Actualités de la Force Populaire des Démocrates.';
$activePage = 'actualites';

$category = isset($_GET['category']) ? trim((string) $_GET['category']) : '';
$search = isset($_GET['q']) ? trim((string) $_GET['q']) : '';
$category = in_array($category, allowed_categories(), true) ? $category : null;

$posts = search_posts($category, $search, 100);

require __DIR__ . '/includes/header.php';
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= e(app_path('images/bg_2.jpg')) ?>');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Actualités</h1>
        <p class="breadcrumbs">
          <span class="mr-2"><a href="<?= e(page_url('home')) ?>">Accueil <i class="ion-ios-arrow-forward"></i></a></span>
          <span>Actualités <i class="ion-ios-arrow-forward"></i></span>
        </p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-4 pb-2">
      <div class="col-md-10">
        <form method="get" class="row">
          <div class="col-md-4 mb-2">
            <select name="category" class="form-control">
              <option value="">Toutes les catégories</option>
              <?php foreach (allowed_categories() as $option): ?>
                <option value="<?= e($option) ?>" <?= $category === $option ? 'selected' : '' ?>><?= e(category_label($option)) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-6 mb-2">
            <input type="text" name="q" class="form-control" placeholder="Rechercher une actualité" value="<?= e($search) ?>">
          </div>
          <div class="col-md-2 mb-2">
            <button type="submit" class="btn btn-primary btn-block">Filtrer</button>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <?php if (empty($posts)): ?>
        <div class="col-12">
          <div class="alert alert-warning">Aucune actualité disponible pour ce filtre.</div>
        </div>
      <?php endif; ?>

      <?php foreach ($posts as $post): ?>
        <?php
        $imageUrl = media_url($post['image_path'] ?? '', 'images/image_2.jpg');
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
              <p class="mb-2">
                <span class="fpd-pill"><?= e(category_label((string) ($post['category'] ?? ''))) ?></span>
              </p>
              <h3 class="heading">
                <a href="<?= e(article_url((string) ($post['slug'] ?? ''))) ?>"><?= e((string) ($post['title'] ?? 'Actualité')) ?></a>
              </h3>
              <p><?= e($excerpt) ?></p>
              <div class="d-flex align-items-center mt-4">
                <p class="mb-0">
                  <a href="<?= e(article_url((string) ($post['slug'] ?? ''))) ?>" class="btn btn-primary">Lire <span class="ion-ios-arrow-round-forward"></span></a>
                </p>
                <p class="ml-auto mb-0">
                  <span><?= e((string) ($post['author_name'] ?? 'FPD')) ?></span>
                </p>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
