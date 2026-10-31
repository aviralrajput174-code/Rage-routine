<?php
// Edit these settings before publishing.
// On InfinityFree, use the MySQL hostname shown in its control panel (not localhost).
define('DB_HOST', 'YOUR_MYSQL_HOST');
define('DB_NAME', 'YOUR_DATABASE_NAME');
define('DB_USER', 'YOUR_DATABASE_USERNAME');
define('DB_PASS', 'YOUR_DATABASE_PASSWORD');
define('STORE_NAME', 'Gaon Basket');
define('STORE_TAGLINE', 'Your Village, Your Grocery Store');
define('STORE_PHONE', ''); // Example: +91 9876543210
define('STORE_ADDRESS', 'Your village, District, Uttar Pradesh');
define('CURRENCY', '₹');
if (session_status() === PHP_SESSION_NONE) session_start();
function db(): PDO {
    static $pdo = null;
    if (!$pdo) {
        $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    return $pdo;
}
function h($value): string { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function money($amount): string { return CURRENCY . number_format((float)$amount, 2); }
