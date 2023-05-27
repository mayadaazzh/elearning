<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: haldosen.php");
    exit;
}

include 'koneksi.php';

// Periksa apakah kunci "id_dosen" tersedia dalam $_SESSION
if (!isset($_SESSION['id_dosen'])) {
    // Lakukan pengaturan nilai "id_dosen" berdasarkan data dosen yang sedang login
    $username = $_SESSION['username'];
    $query = "SELECT id_dosen FROM dosen WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

    $_SESSION['id_dosen'] = $row['id_dosen'];
}

$id_dosen = $_SESSION['id_dosen'];

// Sisanya sama seperti sebelumnya
$query_sudah = "SELECT m.id_mahasiswa, m.Nama, p.file, n.nilai
                FROM mahasiswa m
                LEFT JOIN pengumpulan p ON m.id_mahasiswa = p.id_mahasiswa
                LEFT JOIN nilai n ON p.id_pengumpulan = n.id_pengumpulan
                WHERE p.id_tugas IN (
                    SELECT id_tugas FROM tugas WHERE id_dosen = '$id_dosen'
                )";

$result_sudah = mysqli_query($koneksi, $query_sudah);

$query_belum = "SELECT m.id_mahasiswa, m.Nama
                FROM mahasiswa m
                LEFT JOIN pengumpulan p ON m.id_mahasiswa = p.id_mahasiswa
                WHERE p.id_pengumpulan IS NULL
                AND m.id_mahasiswa NOT IN (
                    SELECT id_mahasiswa FROM pengumpulan WHERE id_tugas IN (
                        SELECT id_tugas FROM tugas WHERE id_dosen = '$id_dosen'
                    )
                )";

$result_belum = mysqli_query($koneksi, $query_belum);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Pengumpulan Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Data Rekap Nilai Pengumpulan</a>
        </div>
    </nav>
    <div class="container">
        <h2>Rekap Pengumpulan Tugas</h2>
        <a href="index.php" class="btn btn-primary">Back</a>

        <h3>Mahasiswa yang Sudah Mengumpulkan Tugas</h3>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Mahasiswa</th>
                    <th>File Pengumpulan</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_sudah)) : ?>
                    <tr>
                        <th scope="row"><?php echo $row['id_mahasiswa']; ?></th>
                        <td><?php echo $row['Nama']; ?></td>
                        <td><?php echo $row['file']; ?></td>
                        <td><?php echo $row['nilai']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h3>Mahasiswa yang Belum Mengumpulkan Tugas</h3>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Mahasiswa</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_belum)) : ?>
                    <tr>
                        <th scope="row"><?php echo $row['id_mahasiswa']; ?></th>
                        <td><?php echo $row['Nama']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>
