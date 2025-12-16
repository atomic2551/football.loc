<?php
require __DIR__ . '/config/db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die('ID not found');
}

$stmt = $pdo->prepare("SELECT * FROM books WHERE id=?");
$stmt->execute([$id]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$book) {
    die('Book not found');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(
        "UPDATE books
         SET title=?, author=?, genre=?, publish_year=?
         WHERE id=?"
    );
    $stmt->execute([
        $_POST['title'],
        $_POST['author'],
        $_POST['genre'],
        $_POST['publish_year'],
        $id
    ]);

    header("Location: index.php");
    exit;
}
?>

<h2>Edit Book</h2>

<form method="post">
    Title: <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>" required><br><br>
    Author: <input type="text" name="author" value="<?= htmlspecialchars($book['author']) ?>" required><br><br>
    Genre: <input type="text" name="genre" value="<?= htmlspecialchars($book['genre']) ?>" required><br><br>
    Publish Year: <input type="number" name="publish_year" value="<?= $book['publish_year'] ?>" required><br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="index.php">Back</a>
