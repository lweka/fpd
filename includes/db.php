<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

function db(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $host = env_value('FPD_DB_HOST', DB_HOST);
    $port = env_value('FPD_DB_PORT', DB_PORT);
    $name = env_value('FPD_DB_NAME', DB_NAME);
    $user = env_value('FPD_DB_USER', DB_USER);
    $pass = env_value('FPD_DB_PASS', DB_PASS);

    $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4', $host, $port, $name);

    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    return $pdo;
}
