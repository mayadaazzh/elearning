<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

include 'koneksi.php';

$id_nilai = $_GET['id_nilai'];

$query = "SELECT tugas.id_tugas, tugas.judul, usermahasiswa.nama, nilai.nilai
          FROM nilai
          INNER JOIN pengumpulan ON nilai.id_pengumpulan = pengumpulan.id_pengumpulan
          INNER JOIN tugas ON pengumpulan.id_tugas = tugas.id_tugas
          INNER JOIN usermahasiswa ON pengumpulan.id_mahasiswa = usermahasiswa.id_mahasiswa
          WHERE nilai.id_nilai = $id_nilai";

$result = mysqli_query($koneksi, $query);
$tugas = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Edit Nilai</a>
        </div>
    </nav>
    <div class="container">
        <h2>Edit Nilai - <?php echo $tugas['judul']; ?></h2>
        <form action="editnilaiaksi.php" method="post">
            <input type="hidden" name="id_nilai" value="<?php echo $id_nilai; ?>">
            <div class="form-group">
                <label for="nama">Nama Mahasiswa:</label>
                <input type="text" class="form-control" id="nama" value="<?php echo $tugas['nama']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nilai">Nilai:</label>
                <input type="number" class="form-control" id="nilai" name="nilai" min="0" max="100" value="<?php echo $tugas['nilai']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>
