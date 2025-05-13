<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Login</h2>

    <?php
    if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
        echo "<p style='color:green;'>Anda sudah login sebagai <strong>" . $_SESSION['username'] . "</strong> (" . $_SESSION['role'] . ")</p>";
        echo "<p><a href='php/logout.php'>Logout</a> untuk login akun lain.</p><hr>";
    }
    ?>

    <form method="POST" action="php/login_process.php">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
