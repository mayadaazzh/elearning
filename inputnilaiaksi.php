<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

include 'koneksi.php';

$id_tugas = $_POST['id_tugas'];
$nilai = $_POST['nilai'];

$query = "INSERT INTO nilai (id_pengumpulan, nilai) 
          SELECT id_pengumpulan, $nilai 
          FROM pengumpulan 
          WHERE id_tugas = $id_tugas";

mysqli_query($koneksi, $query);

header("Location: datatugas.php");
exit;
?>
