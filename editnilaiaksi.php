<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id_tugas = $_POST['id_tugas'];
$nilai = $_POST['nilai'];

// query to update the user's "nilai"
$query = "UPDATE pengumpulan SET nilai='$nilai' WHERE id_tugas = '$id_tugas'";

if (mysqli_query($koneksi, $query)) {
    // jika query dijalankan dan data nilai masuk ke tabel, tampilkan pesan sukses
    echo '<script>alert("nilai berhasil ditambahkan!"); window.location.href = "datatugas.php?id=$id";</script>';
} else {
    // jika query gagal dijalankan, tampilkan pesan gagal
    echo '<script>alert("gagal masukkan nilai, silahkan coba lagi!"); window.location.href = "datatugas.php";</script>';
}
