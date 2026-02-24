<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/app/Controllers/PublicController.php';
require_once __DIR__ . '/app/Controllers/ErrorController.php';

$requestUri = (string) ($_SERVER['REQUEST_URI'] ?? '/');
$path = (string) parse_url($requestUri, PHP_URL_PATH);
$path = $path !== '' ? $path : '/';

$base = rtrim(APP_BASE_PATH, '/');
if ($base !== '' && strpos($path, $base) === 0) {
    $path = substr($path, strlen($base));
    $path = $path === '' ? '/' : $path;
}

$routeParam = isset($_GET['route']) ? trim((string) $_GET['route']) : '';
$route = $routeParam !== '' ? $routeParam : trim($path, '/');
$route = trim($route, '/');

$public = new PublicController();
$error = new ErrorController();

switch (true) {
    case $route === '':
        $public->home();
        break;

    case $route === 'parti':
        $public->parti();
        break;

    case $route === 'actualites':
        $public->actualites();
        break;

    case $route === 'programme':
        $public->programme();
        break;

    case $route === 'mobilisation':
        $public->mobilisation();
        break;

    case $route === 'contact':
        $public->contact();
        break;

    case preg_match('#^article/([a-z0-9-]+)$#i', $route, $matches) === 1:
        $public->article((string) ($matches[1] ?? ''));
        break;

    case $route === 'article':
        $public->article(isset($_GET['slug']) ? (string) $_GET['slug'] : '');
        break;

    default:
        $error->notFound();
        break;
}
