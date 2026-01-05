<?php
include 'db.php';

$title = $_POST['title'];
$content = $_POST['content'];
$date = date("Y-m-d");

$query = "INSERT INTO diary (title, content, date) VALUES ('$title', '$content', '$date')";
mysqli_query($conn, $query);

header("Location: diary.php");
exit();
?>
