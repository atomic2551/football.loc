<?php
require __DIR__ . '/config/db.php';


$stmt = $pdo->prepare(
    "UPDATE courses SET name=?, teacher=?, duration=? WHERE id=?"
);
$stmt->execute([
    $_POST['name'],
    $_POST['teacher'],
    $_POST['duration'],
    $_POST['id']
]);

header("Location: index.php");
