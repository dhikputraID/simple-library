<?php

include 'koneksi.php';

if(isset($_POST['register'])) {
    $nama = $_POST['nama_lengkap'];
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users(nama_lengkap, username, password) VALUES ('$nama', '$user', '$pass')";

    if(mysqli_query($koneksi, $query)) {
        echo "<script>alert('Registerasi berhasil!, silahkan login'); window.location='login.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - SMK Muhammadiyah 3 Tangsel</title>
</head>
<body>
    <h2>Registrasi Perpustakaan</h2>
    <form action="" method="get">
        <label for="">Nama lengkap:</label><br>
        <input type="text" name="nama_lengkap" id="" required><br><br>
        <label for="">Username:</label><br>
        <input type="text" name="username" id="" required><br><br>
        <label for="">Password:</label><br>
        <input type="password" name="password" id="" required><br><br>
        <button type="submit" name="register">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</body>
</html>