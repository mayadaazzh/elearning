<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$id_mahasiswa = $_SESSION['id_mahasiswa'];

// Mendapatkan daftar tugas yang telah diunggah oleh dosen
$query_tugas = "SELECT t.id_tugas, t.judul, t.deskripsi, t.deadline, t.nilai, p.file, n.nilai AS nilai_mahasiswa
                FROM tugas t
                LEFT JOIN pengumpulan p ON t.id_tugas = p.id_tugas AND p.id_mahasiswa = '$id_mahasiswa'
                LEFT JOIN nilai n ON p.id_pengumpulan = n.id_pengumpulan
                WHERE t.deadline >= NOW()";

$result_tugas = mysqli_query($koneksi, $query_tugas);

// Mendapatkan nilai rata-rata dari tugas yang telah diumpulkan oleh mahasiswa
$query_nilai_rata = "SELECT AVG(nilai) AS rata_nilai FROM nilai WHERE id_pengumpulan IN (
                        SELECT id_pengumpulan FROM pengumpulan WHERE id_mahasiswa = '$id_mahasiswa'
                    )";
$result_nilai_rata = mysqli_query($koneksi, $query_nilai_rata);
$row_nilai_rata = mysqli_fetch_assoc($result_nilai_rata);
$nilai_rata = $row_nilai_rata['rata_nilai'];

// Menyimpan jawaban tugas yang diunggah oleh mahasiswa
if (isset($_POST['submit'])) {
    $id_tugas = $_POST['id_tugas'];
    $file = $_FILES['file']['name'];
    // Lakukan validasi dan pemrosesan unggahan file

    // Contoh: Menyimpan file ke direktori server
    move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $file);

    // Menyimpan data pengumpulan tugas ke dalam database
    $query_pengumpulan = "INSERT INTO pengumpulan (id_mahasiswa, id_tugas, file, waktu) VALUES ('$id_mahasiswa', '$id_tugas', '$file', NOW())";
    mysqli_query($koneksi, $query_pengumpulan);

    header("Location: halaman_mahasiswa.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Mahasiswa</title>
</head>

<body>
    <h1>Daftar Tugas</h1>
    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Deadline</th>
                <th>Nilai</th>
                <th>File Pengumpulan</th>
                <th>Nilai Anda</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result_tugas)) : ?>
                <tr>
                    <td><?php echo $row['judul']; ?></td>
                    <td><?php echo $row['deskripsi']; ?></td>
                    <td><?php echo $row['deadline']; ?></td>
                    <td><?php echo $row['nilai']; ?></td>
                    <td><?php echo $row['file']; ?></td>
                    <td><?php echo $row['nilai_mahasiswa']; ?></td>
                    <td>
                        <?php if (empty($row['file'])) : ?>
                            <!-- Form untuk mengumpulkan jawaban tugas -->
                            <form action="halaman_mahasiswa.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_tugas" value="<?php echo $row['id_tugas']; ?>">
                                <input type="file" name="file" required>
                                <input type="submit" name="submit" value="Kumpulkan">
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2>Nilai Rata-rata Tugas Anda: <?php echo $nilai_rata; ?></h2>
</body>

</html>
