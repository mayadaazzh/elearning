<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
include 'koneksi.php';

//cek hasil upload
if (isset($_GET['alert'])) {
	if ($_GET['alert'] == 'gagal_ekstensi') {
?>
		echo "<script>
			alert('Format file tidak sesuai!');
			window.location = 'tambah.php';
		</script>";
		exit;
	<?php
	} elseif ($_GET['alert'] == "gagal_ukuran") {
	?>
		echo "<script>
			alert('Ukuran file terlalu besar!');
			window.location = 'tambah.php';
		</script>";
		exit;
	<?php
	} elseif ($_GET['alert'] == "berhasil") {
	?>
		echo "<script>
			alert('Berhasil ditambahkan!');
			window.location = 'index.php';
		</script>";
		exit;
<?php
	}
}

?>


<!DOCTYPE html>
<html>

<head>
	<title>tambah Data Mahasiswa</title>
	<!-- Add bootstrap stylesheet -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
</head>

<body>
	<div class="container my-4">
		<h2 class="text-center mb-4">TAMBAH DATA MAHASISWA</h2>
		<a href="index.php" class="btn btn-primary mb-4">KEMBALI</a>

		<form method="post" action="tambah_aksi.php" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
			<div class="row mb-3">
				<label for="nrp" class="col-sm-2 col-form-label fw-bold" ;>NRP</label>
				<div class="col-sm-10">
					<input type="number" name="NRP" class="form-control border-dark" id="nrp">
				</div>
			</div>
			<div class="row mb-3">
				<label for="nama" class="col-sm-2 col-form-label fw-bold">Nama</label>
				<div class="col-sm-10">
					<input type="text" name="Nama" class="form-control border-dark" id="nama">
				</div>
			</div>
			<div class="row mb-3">
				<label for="jenis_kelamin" class="col-sm-2 col-form-label fw-bold">Jenis Kelamin</label>
				<div class="col-sm-10">
					<div class="form-check form-check-inline">
						<input class="form-check-input border-dark" type="radio" name="Jenis_Kelamin" id="laki_laki">
						<label class="form-check-label" for="laki_laki">Laki-laki</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input border-dark" type="radio" name="Jenis_Kelamin" id="perempuan">
						<label class="form-check-label" for="perempuan">Perempuan</label>
					</div>
				</div>
			</div>
			<div class="row mb-3">
				<label for="Jurusan" class="col-sm-2 col-form-label fw-bold" style="color: #1F4068;">Jurusan</label>
				<div class="col-sm-10">
					<input type="text" name="Jurusan" class="form-control border-dark" id="Jurusan">
				</div>
			</div>
			<div class="row mb-3">
				<label for="Email_Student" class="col-sm-2 col-form-label fw-bold" style="color: #1F4068;">Email Student</label>
				<div class="col-sm-10">
					<input type="text" name="Email_Student" class="form-control border-dark" id="Email_Student">
				</div>
			</div>
			<div class="row mb-3">
				<label for="Alamat" class="col-sm-2 col-form-label fw-bold" style="color: #1F4068;">Alamat</label>
				<div class="col-sm-10">
					<input type="text" name="Alamat" class="form-control border-dark" id="Alamat">
				</div>
			</div>
			<div class="row mb-3">
				<label for="No_HP" class="col-sm-2 col-form-label fw-bold" style="color: #1F4068;">No HP</label>
				<div class="col-sm-10">
					<input type="number" name="No_HP" class="form-control border-dark" id="No_HP">
				</div>
			</div>
			<div class="row mb-3">
				<label for="Asal_SMA" class="col-sm-2 col-form-label fw-bold" style="color: #1F4068;">Asal SMA</label>
				<div class="col-sm-10">
					<input type="text" name="Asal_SMA" class="form-control border-dark" id="Asal_SMA">
				</div>
			</div>
			<div class="row mb-3">
				<label for="Matakuliahfav" class="col-sm-2 col-form-label fw-bold" style="color: #1F4068;">Matakuliah Fav</label>
				<div class="col-sm-10">
					<input type="text" name="Matakuliahfav" class="form-control border-dark" id="Matakuliahfav">
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label fw-bold" style="color: #1F4068;">Upload</label>
				<div class="col-sm-10">
					<input type="file" name="foto" class="form-control" id="upload" required="required">					
				</div>
			</div>
				<p style="color: red">Format file: .png | .jpg | .jpeg | .gif</p>
			</div>
			<input type="submit" class=" btn btn-primary" style="margin-left: 220px;">
		</form>
		<?php
		?>
</body>

</html>