<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$judul = $_POST['judul'];
$id_dosen = $_POST['id_dosen'];

$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif', 'pdf', 'docx');
$filename = $_FILES['file']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (in_array($ext, $ekstensi)) {
    $xx = $rand . '_' . $filename;
    move_uploaded_file($_FILES['file']['tmp_name'], 'tugas/' . $rand . '_' . $filename);
    $deadline = $_POST['deadline'];
    $query = "INSERT INTO tugas (id_dosen, judul, deskripsi, deadline, file) VALUES ('$id_dosen', '$judul', '', '$deadline', '$xx')";
    if (mysqli_query($koneksi, $query)) {
        echo '<script>alert("Tugas Berhasil Ditambahkan!"); window.location.href = "uploadtugas.php";</script>';
    } else {
        echo '<script>alert("Gagal menambahkan tugas!"); window.location.href = "uploadtugas.php";</script>';
    }
} else {
    echo '<script>alert("Format file tidak sesuai!"); window.location.href = "uploadtugas.php";</script>';
}
?>
