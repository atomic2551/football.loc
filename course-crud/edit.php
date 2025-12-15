<?php
require __DIR__ . '/config/db.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM courses WHERE id=?");
    $stmt->execute([$_GET['id']]);
    $course = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE courses SET name=?, teacher=?, duration=? WHERE id=?");
    $stmt->execute([$_POST['name'], $_POST['teacher'], $_POST['duration'], $_POST['id']]);
    header("Location: index.php");
    exit;
}
?>

<form method="post" action="edit.php">
    <input type="hidden" name="id" value="<?= $course['id'] ?>">
    Name: <input type="text" name="name" value="<?= htmlspecialchars($course['name']) ?>" required><br>
    Teacher: <input type="text" name="teacher" value="<?= htmlspecialchars($course['teacher']) ?>" required><br>
    Duration: <input type="number" name="duration" value="<?= $course['duration'] ?>" required><br>
    <button type="submit">Update</button>
</form>
