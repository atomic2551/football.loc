<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID is required");
}

$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
$stmt->execute([$id]);
$task = $stmt->fetch();
if (!$task) {
    die("Task not found");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $is_done = isset($_POST['is_done']) ? 1 : 0;

    $stmt = $pdo->prepare("UPDATE tasks SET title=?, description=?, is_done=? WHERE id=?");
    $stmt->execute([$title, $description, $is_done, $id]);

    header('Location: index.php');
    exit;
}
?>

<h1>Edit Task</h1>
<form method="post">
    <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>" required><br>
    <textarea name="description"><?= htmlspecialchars($task['description']) ?></textarea><br>
    <label>
        <input type="checkbox" name="is_done" <?= $task['is_done'] ? 'checked' : '' ?>>
        Done
    </label><br>
    <button type="submit">Update</button>
</form>
