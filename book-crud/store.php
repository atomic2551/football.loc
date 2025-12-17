<?php
require __DIR__ . '/config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(
        "INSERT INTO books (title, author, genre, publish_year)
         VALUES (?, ?, ?, ?)"
    );
    $stmt->execute([
        $_POST['title'],
        $_POST['author'],
        $_POST['genre'],
        $_POST['publish_year']
    ]);

    header("Location: index.php");
    exit;
}
?>

<h2>Add New Book</h2>

<form method="post">
    Title: <input type="text" name="title" required><br><br>
    Author: <input type="text" name="author" required><br><br>
    Genre: <input type="text" name="genre" required><br><br>
    Publish Year: <input type="number" name="publish_year" required><br><br>

    <button type="submit">Save</button>
</form>

<br>
<a href="index.php">Back</a>
