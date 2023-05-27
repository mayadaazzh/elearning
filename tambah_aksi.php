<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$nrp = $_POST["NRP"];
$nama = $_POST["Nama"];
$jkelamin = $_POST["Jenis_Kelamin"];
$jurusan = $_POST["Jurusan"];
$email = $_POST["Email_Student"];
$alamat = $_POST["Alamat"];
$nohp = $_POST["No_HP"];
$sma = $_POST["Asal_SMA"];
$matkul = $_POST["Matakuliahfav"];

$rand = rand(); //acak nomor untuk memberi nama file
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
$filename = $_FILES['foto']['name']; //menyimpan nama file yg diinput 
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION); //mengecek ekstensi yg diupload

if(!in_array($ext,$ekstensi) ) { //cek ekstensi format file yg akan diupload
	header("location:tambah.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename; //menyimpan nama file yg disimpan dan disisipkan angka random sebelum nama file
		move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filename); //fungsi php untuk upload file ke folder gambar, diikuti nama file yg random
        mysqli_query($koneksi, "insert into mahasiswa values('','$nrp','$nama','$jkelamin', '$jurusan', '$email', '$alamat', '$nohp', '$sma', '$matkul','$xx')");
		header("location:tambah.php?alert=berhasil");
	}else{
		header("location:tambah.php?alert=gagal_ukuran");
	}
}
