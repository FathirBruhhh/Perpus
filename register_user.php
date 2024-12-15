<?php
include 'config.php';
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: user.php");
    exit();
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Hash the input password using SHA-256
    $cpassword = $_POST['cpassword']; // Hash the input confirm password using SHA-256
    $role = $_POST['role'];
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, pendaftaran berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Maaf, terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Ups, email Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password tidak sesuai.')</script>";
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
    <title>Daftar Anggota Perpus</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Gabung Anggota</p>
            <br>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="" required>
            </div>
            <div class="input-group">
                <select name="role" required>
                    <option value="" disabled selected>Pilih Peran</option>
                    <option value="user">User</option>
                    <option value="owner">Owner</option>
                </select>
            </div>
            <p class="login-register-text">Sudah punya akun? <a href="index.php">Login</a>.</p>
            <br>
            <div class="input-group">
                <button name="submit" class="btn">Daftar</button>
            </div>
        </form>
    </div>
</body>
</html>