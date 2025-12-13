<?php
// test_insert.php

$host = '127.0.0.1';
$db   = 'yii2advanced';
$user = 'root';
$pass = 'root'; // sizning root parolingiz
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    $stmt = $pdo->prepare("
        INSERT INTO tasks (title, description, created_at, updated_at) 
        VALUES (?, ?, ?, ?)
    ");
    $stmt->execute([
        'Birinchi vazifa',
        'Bu birinchi test vazifasi',
        time(),
        time()
    ]);

    echo "Ma'lumot qo'shildi!\n";

} catch (\PDOException $e) {
    echo "Xatolik: " . $e->getMessage() . "\n";
}
