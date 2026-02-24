<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/news.php';

$slug = isset($_GET['slug']) ? trim((string) $_GET['slug']) : '';
$post = get_post_by_slug($slug);

if ($post === null) {
    http_response_code(404);
}

$pageTitle = $post !== null ? ((string) $post['title']) . ' | FPD' : 'Article introuvable | FPD';
$metaDescription = $post !== null ? make_excerpt((string) ($post['excerpt'] ?: $post['content']), 155) : 'Actualité introuvable.';
$activePage = 'actualites';

$related = $post !== null ? get_related_posts((string) ($post['category'] ?? ''), (string) ($post['slug'] ?? ''), 4) : [];

require __DIR__ . '/includes/header.php';
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= e(media_url($post['image_path'] ?? '', 'images/bg_1.jpg')) ?>');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-10 ftco-animate text-center">
        <h1 class="mb-2 bread"><?= e($post !== null ? (string) $post['title'] : 'Actualité introuvable') ?></h1>
        <p class="breadcrumbs">
          <span class="mr-2"><a href="<?= e(page_url('home')) ?>">Accueil <i class="ion-ios-arrow-forward"></i></a></span>
          <span class="mr-2"><a href="<?= e(page_url('actualites')) ?>">Actualités <i class="ion-ios-arrow-forward"></i></a></span>
          <span>Article <i class="ion-ios-arrow-forward"></i></span>
        </p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <?php if ($post === null): ?>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="alert alert-danger">L'article demandé n'existe pas ou n'est plus publié.</div>
          <a href="<?= e(page_url('actualites')) ?>" class="btn btn-primary">Retour aux actualités</a>
        </div>
      </div>
    <?php else: ?>
      <div class="row">
        <div class="col-lg-8 ftco-animate">
          <div class="blog-entry p-4">
            <p class="mb-3">
              <span class="fpd-pill"><?= e(category_label((string) ($post['category'] ?? ''))) ?></span>
              <span class="ml-2"><?= e(format_date_fr((string) ($post['published_at'] ?? ''))) ?></span>
              <span class="ml-2">| <?= e((string) ($post['author_name'] ?? 'FPD')) ?></span>
            </p>
            <h2><?= e((string) $post['title']) ?></h2>
            <?php if (!empty($post['excerpt'])): ?>
              <p><strong><?= e((string) $post['excerpt']) ?></strong></p>
            <?php endif; ?>
            <?php
            $paragraphs = preg_split('/\r\n|\r|\n/', (string) ($post['content'] ?? '')) ?: [];
            foreach ($paragraphs as $paragraph):
                $paragraph = trim($paragraph);
                if ($paragraph === '') {
                    continue;
                }
            ?>
              <p><?= nl2br(e($paragraph)) ?></p>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="col-lg-4 sidebar ftco-animate">
          <div class="sidebar-box">
            <h3>Articles récents</h3>
            <?php if (empty($related)): ?>
              <p>Aucun article associé.</p>
            <?php else: ?>
              <?php foreach ($related as $item): ?>
                <div class="block-21 mb-3 d-flex">
                  <a class="blog-img mr-3" style="background-image: url('<?= e(media_url($item['image_path'] ?? '', 'images/image_3.jpg')) ?>');"></a>
                  <div class="text">
                    <h4 class="heading"><a href="<?= e(article_url((string) ($item['slug'] ?? ''))) ?>"><?= e((string) ($item['title'] ?? 'Article')) ?></a></h4>
                    <div class="meta">
                      <div><span class="icon-calendar"></span> <?= e(format_date_fr((string) ($item['published_at'] ?? ''))) ?></div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
            <p class="mt-3"><a href="<?= e(page_url('actualites')) ?>" class="btn btn-primary">Toutes les actualités</a></p>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
