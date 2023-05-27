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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_mahasiswa = $_SESSION['id_mahasiswa'];
    $id_tugas = $_POST['id_tugas'];

    $file = $_FILES['file'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    if ($file_error === 0) {
        $location = 'uploads/';
        move_uploaded_file($file_tmp, $location . $file_name);

        $query = "INSERT INTO pengumpulan (id_mahasiswa, id_tugas, file) VALUES ('$id_mahasiswa', '$id_tugas', '$file_name')";
        mysqli_query($koneksi, $query);

        echo "Tugas berhasil diunggah.";
    } else {
        echo "Error: Gagal mengunggah tugas.";
    }
}
?>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-lg-3 sidebar">
            <!-- Konten sidebar -->
        </div>
        <div class="col-lg-9 col-12">
            <h3 class="text-center" style="margin-top: 20px;">UPLOAD TUGAS</h3>
            <div class="row my-2">
                <div class="col-md">
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_tugas" value="<?php echo $_GET['id_tugas']; ?>">
                        <div class="form-group">
                            <label class="control-label">File Tugas</label>
                            <input type="file" class="form-control" name="file" id="fileUpload">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('./include/footer.php');
?>
