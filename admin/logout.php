<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/auth.php';

logout_admin();
set_flash('success', 'Vous êtes déconnecté.');

header('Location: ' . page_url('admin_login'));
exit;
