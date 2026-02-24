<?php
declare(strict_types=1);

final class PublicController
{
    public function home(): void
    {
        require __DIR__ . '/../../home.php';
    }

    public function parti(): void
    {
        require __DIR__ . '/../../parti.php';
    }

    public function actualites(): void
    {
        require __DIR__ . '/../../actualites.php';
    }

    public function programme(): void
    {
        require __DIR__ . '/../../programme.php';
    }

    public function mobilisation(): void
    {
        require __DIR__ . '/../../mobilisation.php';
    }

    public function contact(): void
    {
        require __DIR__ . '/../../contact.php';
    }

    public function article(?string $slug = null): void
    {
        $slug = trim((string) $slug);
        if ($slug !== '') {
            $_GET['slug'] = $slug;
        }

        require __DIR__ . '/../../article.php';
    }
}
