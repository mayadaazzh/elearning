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
$query = "SELECT * FROM materi";
$result = mysqli_query($koneksi, $query);
?>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-lg-3 sidebar">
            <!-- Konten sidebar -->
        </div>
        <div class="col-lg-9 col-12">
            <h3 class="text-center" style="margin-top: 20px;">MATERI PEMBELAJARAN</h3>
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
                            <h5 class="modal-title">Tambah Materi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form method="post" enctype="multipart/form-data" action="aksi_materi.php">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label">Nama Materi</label>
                                    <input type="hidden" name="id_dosen" class="form-control">
                                    <?php
                                    include 'koneksi.php';
                                    $query2 = "SELECT * FROM dosen";
                                    $result2 = mysqli_query($koneksi, $query2);
                                    $data2 = mysqli_fetch_assoc($result2);
                                    ?>
                                    <input type="hidden" name="id_dosen" value="<?php echo $data2['id_dosen']; ?>" class="form-control">
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="fileUpload" class="form-label">Pilih File</label>
                                    <input type="file" class="form-control" name="materi" id="fileUpload">
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
                        <th>Title</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>

                    <?php while ($data = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['title']; ?></td>
                            <td><a href="download.php?materi=<?php echo $data['materi']; ?>"><?php echo $data['materi']; ?></a></td>
                            <td class="d-flex justify-content-center">
                                <a href="aksi_hapusmateri.php?id_materi=<?php echo $data['id_materi']; ?>" class="btn btn-danger mt-2" style="font-weight: 400;" onclick="return confirm('Apakah anda yakin ingin menghapus?');">
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