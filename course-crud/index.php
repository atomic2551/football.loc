<?php
require __DIR__ . '/config/db.php';

$stmt = $pdo->query("SELECT * FROM courses");
$courses = $stmt->fetchAll();
?>
<h1>Courses</h1>
<a href="store.php">Add New Course</a>
<ul>
    <?php foreach ($courses as $course): ?>
        <li>
            <?= htmlspecialchars($course['name']) ?> -
            <?= htmlspecialchars($course['teacher']) ?> -
            <?= $course['duration'] ?>
            <a href="store.php">Add New Course</a>
            <a href="edit.php?id=<?= $course['id'] ?>">Edit</a>
            <a href="delete.php?id=<?= $course['id'] ?>">Delete</a>

        </li>
    <?php endforeach; ?>
</ul>
