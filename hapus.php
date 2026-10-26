<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['status_login'])){
    header("location: login.php");
    exit;
}
 $id = $_GET['id'];
 $query= "DELETE FROM buku WHERE id='$id'";
 if (mysqli_query($koneksi, $query)){
    echo "<script>alert('Data berhasil di hapus!'); window.location='dashboard.php';</script>";
 } else {
    echo "error: ". mysqli_error($koneksi);    
 }

 // di buat lutfi