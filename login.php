<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];

    $q = mysqli_query($conn, "SELECT * FROM users WHERE username='$u' AND password='$p'");
    if (mysqli_num_rows($q) > 0) {
        $_SESSION['user'] = $u;
        header("Location: diary.php");
        exit();
    } else {
        $error = "Invalid Login";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HeartLog - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1 class="main-title">❤️ HeartLog</h1>

<div class="login-container">
    <h2>Login</h2>

    <?php if (isset($error)) echo "<p class='error-msg'>$error</p>"; ?>

    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</div>

</body>
</html>
