<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

include 'koneksi.php';

$id_nilai = $_POST['id_nilai'];
$nilai = $_POST['nilai'];

$query = "UPDATE nilai SET nilai = $nilai WHERE id_nilai = $id_nilai";
mysqli_query($koneksi, $query);

header("Location: datatugas.php");
exit;
?>
