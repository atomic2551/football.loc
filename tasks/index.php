<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db.php';

$stmt = $pdo->query('SELECT * FROM tasks');
$tasks = $stmt->fetchAll();
?>

<h1>Tasks</h1>
<a href="create.php">Add New Task</a>
<ul>
    <?php foreach ($tasks as $task): ?>
        <li>
            <?= htmlspecialchars($task['title']) ?> - <?= $task['is_done'] ? 'Done' : 'Pending' ?>
            <a href="edit.php?id=<?= $task['id'] ?>">Edit</a>
            <a href="delete.php?id=<?= $task['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>
