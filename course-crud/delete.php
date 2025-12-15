<?php
require __DIR__ . '/config/db.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM courses WHERE id=?");
    $stmt->execute([$_GET['id']]);
}

header("Location: index.php");
exit;
