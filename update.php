<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nrp = $_POST["NRP"];
$nama = $_POST["Nama"];
$jkelamin = $_POST["Jenis_Kelamin"];
$jurusan = $_POST["Jurusan"];
$email = $_POST["Email_Student"];
$alamat = $_POST["Alamat"];
$nohp = $_POST["No_HP"];
$sma = $_POST["Asal_SMA"];
$matkul = $_POST["Matakuliahfav"];

$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (in_array($ext, $ekstensi)) {
    $xx = $rand . '_' . $filename;
    move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/' . $rand . '_' . $filename);
    mysqli_query($koneksi, "update mahasiswa set NRP='$nrp',Nama='$nama',Jenis_Kelamin='$jkelamin', Jurusan='$jurusan', Email_Student='$email', Alamat='$alamat', No_HP='$nohp', Asal_SMA='$sma', Matakuliahfav='$matkul', foto='$xx' where id = '$id'");
    header("location:index.php");
} else {
    header("location:edit.php");
}
