<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: logindosen.php");
    exit;
}

include 'koneksi.php'; // Ganti dengan username dosen yang ingin Anda ambil datanya
$id_dosen = ['id_dosen'];
$query = "SELECT * FROM dosen";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result); // Inisialisasi $data
?>

<?php 
include('./include/header.php');
?>

    <div class="content">
        <h1>Selamat Datang, <?php echo $data['nama']; ?></h1>
        <br>
        <div class="card">
            <div class="card-header">
                Profil
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="gambar/<?php echo $data['foto']; ?>" width="150" height="190">
                    </div>
                    <div class="col-md-7">
                        <p>NIP: <?php echo $data['nip']; ?></p>
                        <p>Nama Lengkap: <?php echo $data['nama']; ?></p>
                        <p>Alamat: <?php echo $data['alamat']; ?></p>
                        <p>No.Hp: <?php echo $data['nohp']; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                Mata Kuliah
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                    $data2 = $data;
                    $no = 1;
                    if ($data2 == $data) {
                    ?>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <?php echo $data2['kelasampu']; ?>
                                </div>
                                <div class="card-body">
                                    <h4><?php echo $data2['matakuliahampu']; ?></h4>
                                    <a href="wpw<?php echo $no++ ?>.php" class="btn btn-secondary">masuk</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php 
include('./include/footer.php');
?>