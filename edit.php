<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['status_login'])){
    header("location: login.php");
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])){
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];

    $update_query = "UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun', stok='$stok' WHERE id='$id'";
    if (mysqli_query($koneksi, $update_query)){
        echo "<script>alert('Data buku berhasil di ubah!'); window.location='dashboard.php';</script>";
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
    <title>edit buku</title>
</head>
<body>
    <h2>Form Edit Buku</h2>
    <form action="" method="post">
        <label>Judul Buku:</label><br>
        <input type="text" name="judul" value="<?php echo $data['judul']; ?>" required><br><br>
        <label>Pengarang:</label><br>
        <input type="text" name="pengarang" value="<?php echo $data['pengarang']; ?>" required><br><br>
        <label>Penerbit:</label><br>
        <input type="text" name="penerbit" value="<?php echo $data['penerbit']; ?>" required><br><br>
        <label>Tahun Terbit:</label><br>
        <input type="number" name="tahun_terbit" value="<?php echo $data['tahun_terbit']; ?>" required><br><br>
        <label>Stok:</label><br>
        <input type="number" name="stok" value="<?php echo $data['stok']; ?>" required><br><br>
        <button type="submit" name="update">Update data</button>
        <a href="dashboard.php">batal</a>
    </form>
</body>
</html>
// di buat lutfi