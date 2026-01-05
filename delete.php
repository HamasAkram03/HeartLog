<?php
include 'db.php';

$id = intval($_GET['id']);
mysqli_query($conn, "DELETE FROM diary WHERE id=$id");

header("Location: diary.php");
exit();
?>
