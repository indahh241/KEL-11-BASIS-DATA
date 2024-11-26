<?php include '../config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<link rel="stylesheet" href="../css/style.css">
<body>
    <h1></h1>
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION['logged_in'] = true;
            header("Location: index.php");
        } else {
            echo "<p style='color:red;'>Login gagal, username atau password salah.</p>";
        }
    }
    ?>
</body>
</html>
<p class="center-text">
    Belum punya akun? <a href="register.php">Daftar di sini</a>.
</p>

