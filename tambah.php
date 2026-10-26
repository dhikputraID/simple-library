<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['status_login'])){
    header("location: login.php");
    exit;
}
if (isset($_POST['simpan'])){
    $judul =$_POST['judul'];
    $pengarang =$_POST['pengarang'];
    $penerbit =$_POST['penerbit'];
    $tahun =$_POST['tahun_terbit'];
    $stok =$_POST['stok'];

    $query = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, stok) VALUES ('$judul', '$pengarang', '$penerbit', '$tahun', '$stok')";
    if (mysqli_query($koneksi, $query)){
        echo "<script>alert('Data buku berhasil di tambahkan!'); window.location='dashboard.php';</script>";
    } else {
        echo "error: ". mysqli_error($koneksi);    
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
</head>
<body>
    <h2>Form Tambah Buku</h2>
    <form action="" method="post">
        <label>Judul Buku:</label><br>
        <input type="text" name="judul" required><br><br>
        <label>Pengarang:</label><br>
        <input type="text" name="pengarang" required><br><br>
        <label>Penerbit:</label><br>
        <input type="text" name="penerbit" required><br><br>
        <label>Tahun Terbit:</label><br>
        <input type="number" name="tahun_terbit" required><br><br>
        <label>Stok:</label><br>
        <input type="number" name="stok" required><br><br>
       <button type="submit" name="simpan">Simpan data</button>
       <a href="dashboard.php">batal</a>

    </form>
</body>
</html>

<!-- Create by: lutfi ansori -->
<!-- Credit to: Kevin Permana, S.Kom -->