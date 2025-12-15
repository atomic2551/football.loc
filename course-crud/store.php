<?php
require __DIR__ . '/config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO courses (name, teacher, duration) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['teacher'], $_POST['duration']]);
    header("Location: index.php");
    exit;
}
?>

<form method="post" action="store.php">
    Name: <input type="text" name="name" required><br>
    Teacher: <input type="text" name="teacher" required><br>
    Duration: <input type="number" name="duration" required><br>
    <button type="submit">Add</button>
</form>
