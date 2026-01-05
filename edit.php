<?php
include 'db.php';
$id = intval($_GET['id']);

if (isset($_POST['update'])) {
    $t = $_POST['title'];
    $c = $_POST['content'];
    mysqli_query($conn, "UPDATE diary SET title='$t', content='$c' WHERE id=$id");
    header("Location: diary.php");
    exit();
}

$r = mysqli_query($conn, "SELECT * FROM diary WHERE id=$id");
$row = mysqli_fetch_assoc($r);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Entry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="diary-page">

<div class="container">
    <h2>Edit Diary Entry</h2>

    <form method="post">
        <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>
        <textarea name="content" required><?php echo htmlspecialchars($row['content']); ?></textarea>
        <button name="update">Update</button>
    </form>

    <a href="diary.php" class="back-link">Back to Diary</a>
</div>

</body>
</html>
