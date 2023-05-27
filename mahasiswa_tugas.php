<?php
include('./include/header.php');
?>

<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

include 'koneksi.php';

// Mendapatkan daftar tugas
$query = "SELECT * FROM tugas";
$result = mysqli_query($koneksi, $query);
?>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center" style="margin-top: 20px;">TUGAS MAHASISWA</h3>
        </div>
    </div>
    <div class="row justify-content-center my-2">
        <?php while ($data = mysqli_fetch_assoc($result)) { ?>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['judul']; ?></h5>
                        <p class="card-text"><?php echo $data['deskripsi']; ?></p>
                        <p class="card-text">Deadline: <?php echo $data['deadline']; ?></p>
                        <a href="download.php?tugas=<?php echo $data['file']; ?>" class="card-link"><?php echo $data['file']; ?></a>
                        <?php
                        // Memeriksa apakah mahasiswa telah mengumpulkan tugas
                        $id_mahasiswa = $_SESSION["id_mahasiswa"];
                        $id_tugas = $data['id_tugas'];
                        $query_pengumpulan = "SELECT * FROM pengumpulan WHERE id_mahasiswa = '$id_mahasiswa' AND id_tugas = '$id_tugas'";
                        $result_pengumpulan = mysqli_query($koneksi, $query_pengumpulan);
                        $jumlah_pengumpulan = mysqli_num_rows($result_pengumpulan);

                        if ($jumlah_pengumpulan > 0) {
                            // Mahasiswa telah mengumpulkan tugas
                            $data_pengumpulan = mysqli_fetch_assoc($result_pengumpulan);
                            $id_pengumpulan = $data_pengumpulan['id_pengumpulan'];
                            $nilai = $data_pengumpulan['nilai'];
                        ?>
                            <p class="card-text">Status: Sudah Mengumpulkan</p>
                            <p class="card-text">Nilai: <?php echo $nilai; ?></p>
                            <a href="upload_jawaban.php?id_pengumpulan=<?php echo $id_pengumpulan; ?>" class="btn btn-primary">Ubah Jawaban</a>
                        <?php } else { ?>
                            <p class="card-text">Status: Belum Mengumpulkan</p>
                            <form method="post" action="submitmahasiswa.php" enctype="multipart/form-data">
                                <input type="hidden" name="id_mahasiswa" value="<?php echo $id_mahasiswa; ?>">
                                <?php if (!empty($data['nilai'])) { ?>
                                    <p>Edit Tugas:</p>
                                    <input type="file" name="tugasfile" class="form-control" id="inputGroupFile01" required="required">
                                    <button type="submit" name="submit" value="edit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Data</button>
                                <?php } else { ?>
                                    <p>Insert Data:</p>
                                    <input type="file" name="tugasfile" class="form-control" id="inputGroupFile01" required="required">
                                    <button type="submit" name="submit" value="simpan" class="btn btn-primary"><i class="fas fa-upload"></i> Unggah</button>
                                <?php } ?>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php
include('./include/footer.php');
?>
