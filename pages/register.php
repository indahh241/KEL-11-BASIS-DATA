<?php include '../config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Register</h1>
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required>
        <button type="submit">Register</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Validasi password
        if ($password !== $confirm_password) {
            echo "<p style='color:red;'>Password tidak cocok!</p>";
        } else {
            // Enkripsi password dan simpan ke database
            $hashed_password = md5($password);
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
            
            if ($conn->query($sql)) {
                echo "<p style='color:green;'>Akun berhasil dibuat. Silakan <a href='login.php'>login</a>.</p>";
            } else {
                echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
            }
        }
    }
    ?>
</body>
</html>
