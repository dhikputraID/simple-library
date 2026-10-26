<?php

session_start();
include 'koneksi.php';

if(isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$user'");
    $data = mysqli_fetch_assoc($query);

    if($data && password_verify($pass, $data['password'])) {
        $_SESSION['status_login'] = true;
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
        header("location: dashboard.php");
    } else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan SMK Muhammadiyah 3 Tangsel</title>
</head>
<body>
    <h2>Login Perpustakaan</h2>
    <form action="" method="post">
        <label for="">Username:</label><br>
        <input type="text" name="username" id="" required><br><br>
        <label for="">Password:</label><br>
        <input type="password" name="password" id="" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>
    <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</body>
</html>

<!-- Create by: dhika puta -->
<!-- Credit to: Kevin Permana, S.Kom -->