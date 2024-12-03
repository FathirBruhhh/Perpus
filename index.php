<?php 
include 'config.php';
session_start();
 
if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: login_admin.php");
        exit(); // Tambahkan ini
    } elseif ($_SESSION['role'] === 'user') {
        header("Location: login_user.php");
        exit(); // Tambahkan ini
    }
    
}
 
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; // Password tidak dienkripsi sesuai dengan kode awal
 
    // Query untuk mencocokkan email dan password
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
 
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username']; // Menyimpan username ke sesi
        $_SESSION['role'] = $row['role']; // Menyimpan role ke sesi

        // Redirect berdasarkan role
        if ($row['role'] === 'admin') {
            header("Location: login_admin.php");
            exit();
        } elseif ($row['role'] === 'user') {
            header("Location: login_user.php");
            exit();
        }
    } else {
        echo "<script>alert('Email atau password Anda salah. Silakan coba lagi!')</script>";
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login Perpus</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
