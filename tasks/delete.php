<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID is required");
}

$stmt = $pdo->prepare("DELETE FROM tasks WHERE id=?");
$stmt->execute([$id]);

header('Location: index.php');
exit;
