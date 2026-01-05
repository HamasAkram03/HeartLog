<?php
$conn = mysqli_connect("localhost", "root", "", "online_diary");
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
