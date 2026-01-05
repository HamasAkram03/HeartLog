<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>HeartLog - My Diary</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body class="diary-page">

<div class="logout">
    <a href="logout.php">Logout</a>
</div>

<div class="container">
    <h2 class="diary-title">My Diary</h2>

    <h3>Add New Entry</h3>

    <form action="add.php" method="post">
        <input type="text" name="title" placeholder="Title" class="title-input" required>
        <textarea name="content" placeholder="Write your diary..." required></textarea>
        <button type="submit">Add</button>
    </form>

    <h3>My Entries</h3>

    <table>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Action</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM diary ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td class="title-cell"><?php echo htmlspecialchars($row['title']); ?></td>
                <td><?php echo $row['date']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirmDelete()">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>
