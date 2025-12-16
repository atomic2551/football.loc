<?php

$host = '127.0.0.1';
$db   = 'library_db';
$user = 'root';
$pass = 'root'; // agar parol bo‘lsa — yozing
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("DB xatolik: " . $e->getMessage());
}
