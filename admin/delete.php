<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/news.php';
require_once __DIR__ . '/../includes/auth.php';

require_admin_auth();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . page_url('admin_home'));
    exit;
}

$csrfToken = isset($_POST['csrf_token']) ? (string) $_POST['csrf_token'] : '';
$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

if (!verify_csrf($csrfToken)) {
    set_flash('error', 'Session invalide. Réessayez.');
    header('Location: ' . page_url('admin_home'));
    exit;
}

if ($id <= 0) {
    set_flash('error', 'Identifiant invalide.');
    header('Location: ' . page_url('admin_home'));
    exit;
}

try {
    admin_delete_post($id);
    set_flash('success', 'Actualité supprimée.');
} catch (Throwable $exception) {
    set_flash('error', 'Suppression impossible.');
}

header('Location: ' . page_url('admin_home'));
exit;
