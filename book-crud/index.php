<?php
require __DIR__ . '/config/db.php';

$stmt = $pdo->query("SELECT * FROM books ORDER BY id DESC");
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
</head>
<body>

<h1>Books List</h1>

<a href="store.php">Add New Book</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Year</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($books as $book): ?>
        <tr>
            <td><?= $book['id'] ?></td>
            <td><?= htmlspecialchars($book['title']) ?></td>
            <td><?= htmlspecialchars($book['author']) ?></td>
            <td><?= htmlspecialchars($book['genre']) ?></td>
            <td><?= $book['publish_year'] ?></td>
            <td>
                <a href="edit.php?id=<?= $book['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $book['id'] ?>"
                   onclick="return confirm('Delete this book?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
