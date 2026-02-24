<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function app_path(string $path = ''): string
{
    $base = rtrim(APP_BASE_PATH, '/');
    $suffix = ltrim($path, '/');

    if ($base === '') {
        return '/' . $suffix;
    }

    if ($suffix === '') {
        return $base . '/';
    }

    return $base . '/' . $suffix;
}

function page_url(string $route, array $query = []): string
{
    $routes = [
        'home' => '',
        'parti' => 'parti',
        'actualites' => 'actualites',
        'programme' => 'programme',
        'mobilisation' => 'mobilisation',
        'contact' => 'contact',
        'article' => 'article',
        'admin_login' => 'admin/login.php',
        'admin_home' => 'admin/index.php',
        'admin_edit' => 'admin/edit.php',
        'admin_delete' => 'admin/delete.php',
        'admin_logout' => 'admin/logout.php',
    ];

    $target = $routes[$route] ?? ltrim($route, '/');
    $url = app_path($target);

    if (empty($query)) {
        return $url;
    }

    $separator = strpos($url, '?') === false ? '?' : '&';
    return $url . $separator . http_build_query($query, '', '&', PHP_QUERY_RFC3986);
}

function article_url(string $slug): string
{
    $slug = trim($slug);
    if ($slug === '') {
        return page_url('actualites');
    }

    return app_path('article/' . rawurlencode($slug));
}

function slugify(string $value): string
{
    $value = trim($value);
    $value = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $value);
    $value = strtolower((string) $value);
    $value = preg_replace('/[^a-z0-9]+/', '-', $value) ?? '';
    $value = trim($value, '-');

    return $value !== '' ? $value : 'actualite';
}

function format_date_fr(?string $date): string
{
    if ($date === null || $date === '') {
        return '';
    }

    $timestamp = strtotime($date);
    if ($timestamp === false) {
        return $date;
    }

    $months = [
        1 => 'janvier',
        'février',
        'mars',
        'avril',
        'mai',
        'juin',
        'juillet',
        'août',
        'septembre',
        'octobre',
        'novembre',
        'décembre',
    ];

    $day = (int) date('j', $timestamp);
    $month = $months[(int) date('n', $timestamp)] ?? date('m', $timestamp);
    $year = date('Y', $timestamp);

    return sprintf('%d %s %s', $day, $month, $year);
}

function ensure_csrf_token(): string
{
    if (!isset($_SESSION['csrf_token']) || !is_string($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(16));
    }

    return $_SESSION['csrf_token'];
}

function csrf_field(): string
{
    $token = ensure_csrf_token();
    return '<input type="hidden" name="csrf_token" value="' . e($token) . '">';
}

function verify_csrf(?string $token): bool
{
    if (!isset($_SESSION['csrf_token']) || !is_string($_SESSION['csrf_token'])) {
        return false;
    }

    if ($token === null || $token === '') {
        return false;
    }

    return hash_equals($_SESSION['csrf_token'], $token);
}

function category_label(string $category): string
{
    $map = [
        'communique' => 'Communiqués',
        'terrain' => 'Terrain',
        'formation' => 'Formation',
        'mobilisation' => 'Mobilisation',
    ];

    return $map[$category] ?? ucfirst($category);
}

function active_class(string $activePage, string $current): string
{
    return $activePage === $current ? 'active' : '';
}

function make_excerpt(string $content, int $length = 180): string
{
    $content = trim(strip_tags($content));
    if (str_length($content) <= $length) {
        return $content;
    }

    return rtrim(str_sub($content, 0, $length - 1)) . '...';
}

function is_external_url(string $path): bool
{
    return (bool) preg_match('/^https?:\\/\\//i', $path);
}

function media_url(?string $path, string $fallback = 'images/bg_1.jpg'): string
{
    $candidate = trim((string) $path);

    if ($candidate === '') {
        return app_path($fallback);
    }

    if (is_external_url($candidate)) {
        return $candidate;
    }

    if (!file_exists(__DIR__ . '/../' . ltrim($candidate, '/'))) {
        return app_path($fallback);
    }

    return app_path(ltrim($candidate, '/'));
}

function set_flash(string $key, string $message): void
{
    if (!isset($_SESSION['flash']) || !is_array($_SESSION['flash'])) {
        $_SESSION['flash'] = [];
    }

    $_SESSION['flash'][$key] = $message;
}

function get_flash(string $key): ?string
{
    if (!isset($_SESSION['flash']) || !is_array($_SESSION['flash'])) {
        return null;
    }

    if (!array_key_exists($key, $_SESSION['flash'])) {
        return null;
    }

    $message = (string) $_SESSION['flash'][$key];
    unset($_SESSION['flash'][$key]);

    return $message;
}

function str_length(string $value): int
{
    if (function_exists('mb_strlen')) {
        return mb_strlen($value, 'UTF-8');
    }

    return strlen($value);
}

function str_sub(string $value, int $start, ?int $length = null): string
{
    if (function_exists('mb_substr')) {
        return mb_substr($value, $start, $length ?? str_length($value), 'UTF-8');
    }

    return $length === null ? substr($value, $start) : substr($value, $start, $length);
}

function str_lower(string $value): string
{
    if (function_exists('mb_strtolower')) {
        return mb_strtolower($value, 'UTF-8');
    }

    return strtolower($value);
}

function str_contains_ci(string $haystack, string $needle): bool
{
    return strpos(str_lower($haystack), str_lower($needle)) !== false;
}

/**
 * Provinces where the party is currently represented on the site.
 *
 * @return array<int, array{slug:string,name:string,city:string}>
 */
function fpd_represented_provinces(): array
{
    return [
        ['slug' => 'kinshasa', 'name' => 'Kinshasa', 'city' => 'Kinshasa'],
        ['slug' => 'kongo-central', 'name' => 'Kongo Central', 'city' => 'Matadi'],
        ['slug' => 'kasai-oriental', 'name' => 'Kasai Oriental', 'city' => 'Mbuji-Mayi'],
        ['slug' => 'haut-katanga', 'name' => 'Haut-Katanga', 'city' => 'Lubumbashi'],
        ['slug' => 'nord-kivu', 'name' => 'Nord-Kivu', 'city' => 'Goma'],
    ];
}
