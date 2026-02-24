<?php
declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

date_default_timezone_set('Africa/Kinshasa');

const APP_NAME = 'Force Populaire des Démocrates';

// Optional. Example: '/fpd' in local WAMP, '' if domain root.
const APP_BASE_PATH = '/fpd';

const DB_HOST = '127.0.0.1';
const DB_PORT = '3306';
const DB_NAME = 'fpd_cms';
const DB_USER = 'root';
const DB_PASS = '';

function env_value(string $key, string $default = ''): string
{
    $value = getenv($key);
    return $value !== false ? (string) $value : $default;
}
