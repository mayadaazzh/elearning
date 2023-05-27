<?php

session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

?>


<?php 
include('./include/header.php');
?>

<body>

    <!-- Container -->
    <div class="container-fluid">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">Data Mahasiswa PENS</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <a href="tambah.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
            </div>
        </div>
        <div class="table-responsive">
            <table id="data" class="table table-striped table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NRP</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Jurusan</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">No HP</th>
                        <th class="text-center">Asal SMA</th>
                        <th class="text-center">Mata Kuliah Fav</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT * FROM `mahasiswa` WHERE 1");
                    while ($row = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['NRP']; ?></td>
                            <td><?php echo $row['Nama']; ?></td>
                            <td><?php echo $row['Jenis_Kelamin']; ?></td>
                            <td><?php echo $row['Jurusan']; ?></td>
                            <td><?php echo $row['Email_Student']; ?></td>
                            <td><?php echo $row['Alamat']; ?></td>
                            <td><?php echo $row['No_HP']; ?></td>
                            <td><?php echo $row['Asal_SMA']; ?></td>
                            <td><?php echo $row['Matakuliahfav']; ?></td>
                            <td><img src="gambar/<?php echo $row['foto']; ?>" width="80" height="100"></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" style="font-weight: 400;"><i class="bi bi-pencil-square"></i></a>
                                <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" style="font-weight: 400;" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['Nama']; ?> ?');"><i class="bi bi-trash-fill"></i>&nbsp;</a>
                                <!-- download -->
                                <a class="btn btn-primary btn-sm" href="download.php?foto=<?php echo $row['foto']; ?>"><i class="fa-solid fa-download" style="color: #ffffff;"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Close Content -->

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://kit.fontawesome.com/90add86f1d.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#data').DataTable({
                responsive: true
            });
        })
    </script>
</body>

</html>

<?php 
include('./include/footer.php');
?>
