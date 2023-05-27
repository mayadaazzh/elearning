<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_tugas'];
 
// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM `tugas` WHERE `id_tugas`='$id'");
 
// mengalihkan halaman kembali ke uploadmateri.php
header("location: uploadtugas.php");
 
?> 