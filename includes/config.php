<?php
declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

date_default_timezone_set('Africa/Kinshasa');

const APP_NAME = 'Force Populaire des Democrates';

/**
 * Normalize a base path to either '' (domain root) or '/subdir'.
 */
function normalize_base_path(string $value): string
{
    $value = trim(str_replace('\\', '/', $value));
    if ($value === '' || $value === '/' || $value === '.') {
        return '';
    }

    return '/' . trim($value, '/');
}

/**
 * APP_BASE_PATH resolution order:
 * 1) Environment variable APP_BASE_PATH, if provided
 * 2) Automatic detection from SCRIPT_NAME (works for both root and /subdir)
 */
$envBasePath = getenv('APP_BASE_PATH');
$detectedBasePath = normalize_base_path(dirname((string) ($_SERVER['SCRIPT_NAME'] ?? '')));
$resolvedBasePath = $envBasePath !== false && trim((string) $envBasePath) !== ''
    ? normalize_base_path((string) $envBasePath)
    : $detectedBasePath;

define('APP_BASE_PATH', $resolvedBasePath);

const DB_HOST = '127.0.0.1';
const DB_PORT = '3306';
const DB_NAME = 'fpd_cms';
const DB_USER = 'root';
const DB_PASS = '2026';

function env_value(string $key, string $default = ''): string
{
    $value = getenv($key);
    return $value !== false ? (string) $value : $default;
}