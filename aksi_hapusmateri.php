<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_materi'];
 
// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM `materi` WHERE `id_materi`='$id'");
 
// mengalihkan halaman kembali ke uploadmateri.php
header("location: uploadmateri.php");
 
?> 