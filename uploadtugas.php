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
$no = 1;
$query = "SELECT * FROM tugas";
$result = mysqli_query($koneksi, $query);
?>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-lg-3 sidebar">
            <!-- Konten sidebar -->
        </div>
        <div class="col-lg-9 col-12">
            <h3 class="text-center" style="margin-top: 20px;">TUGAS MAHASISWA</h3>
            <div class="row my-2">
                <div class="col-md">
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#tambah">
                        <i class="fa-solid fa-file-arrow-up"></i>&nbsp;Upload
                    </button>
                </div>
            </div>
            <div class="modal" tabindex="-1" id="tambah">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Tugas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form method="post" enctype="multipart/form-data" action="aksi_tugas.php">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label">Judul Tugas</label>
                                    <input type="hidden" name="id_dosen" class="form-control">
                                    <?php
                                    include 'koneksi.php';
                                    $query2 = "SELECT * FROM dosen";
                                    $result2 = mysqli_query($koneksi, $query2);
                                    $data2 = mysqli_fetch_assoc($result2);
                                    ?>
                                    <input type="hidden" name="id_dosen" value="<?php echo $data2['id_dosen']; ?>" class="form-control">
                                    <input type="text" name="judul" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi" id="fileUpload">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Deadline</label>
                                    <input type="datetime-local" name="deadline" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">File</label>
                                    <input type="file" class="form-control" name="file" id="fileUpload">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr class="table-dark text-center">
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Deadline</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>

                    <?php while ($data = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><a href="datatugas.php?id_tugas=<?php echo $data['id_tugas']; ?>"><?php echo $data['judul']; ?></a></td>
                            <td><?php echo $data['deskripsi']; ?></td>
                            <td><?php echo $data['deadline']; ?></td>
                            <td><a href="download.php?id_tugas=<?php echo $data['file']; ?>"><?php echo $data['file']; ?></a></td>
                            <td class="d-flex justify-content-center">
                                <a href="aksi_hapustugas.php?id_tugas=<?php echo $data['id_tugas']; ?>" class="btn btn-danger mt-2" style="font-weight: 400;" onclick="return confirm('Apakah anda yakin ingin menghapus?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>

                </table>
            </div>
        </div>
    </div>
</div>

<?php
include('./include/footer.php');
?>