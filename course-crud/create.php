require __DIR__ . '/config/db.php';

<h2>Create Course</h2>

<form action="store.php" method="POST">
    <input type="text" name="name" placeholder="Course name">
    <input type="text" name="teacher" placeholder="Teacher">
    <input type="number" name="duration" placeholder="Duration (month)">
    <button type="submit">Save</button>
</form>
