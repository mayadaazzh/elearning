<?php
session_start();
date_default_timezone_set("Asia/Jakarta");

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_tugas = $_POST['id_tugas'];
    $id_mahasiswa = $_SESSION['id_mahasiswa'];
    $file = $_FILES['file']['name'];
    $waktu = date("Y-m-d H:i:s");

    // Periksa apakah mahasiswa sudah memiliki pengumpulan tugas untuk tugas ini
    $query_check = "SELECT * FROM pengumpulan WHERE id_tugas = '$id_tugas' AND id_mahasiswa = '$id_mahasiswa'";
    $result_check = mysqli_query($koneksi, $query_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Mahasiswa sudah memiliki pengumpulan, lakukan update
        $query_update = "UPDATE pengumpulan SET file = '$file', waktu = '$waktu' WHERE id_tugas = '$id_tugas' AND id_mahasiswa = '$id_mahasiswa'";
        mysqli_query($koneksi, $query_update);
        echo "<script>alert('Tugas berhasil diedit!'); window.location='isitugas.php';</script>";
    } else {
        // Mahasiswa belum memiliki pengumpulan, lakukan insert
        $query_insert = "INSERT INTO pengumpulan (id_mahasiswa, id_tugas, file, waktu) VALUES ('$id_mahasiswa', '$id_tugas', '$file', '$waktu')";
        mysqli_query($koneksi, $query_insert);
        echo "<script>alert('Tugas berhasil dikumpulkan!'); window.location='isitugas.php';</script>";
    }

    // Upload file ke direktori yang diinginkan
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    echo "<script>alert('Tugas sudah dikumpulkan'); window.location='isitugas.php';</script>";
}
?>
