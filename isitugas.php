<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
include 'koneksi.php';

$id_dosen = $_GET['id_dosen'];
$query = "SELECT * FROM tugas WHERE id_dosen = '$id_dosen'";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Mahasiswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dashboard {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
        }

        .dashboard .nav-link {
            color: #fff;
        }

        .content {
            padding: 20px;
            background-color: #f8f9fa;
        }

        @media (min-width: 992px) {
            .dashboard {
                position: fixed;
                top: 56px;
                bottom: 0;
                left: 0;
                width: 250px;
                overflow-y: auto;
            }

            .content {
                margin-left: 250px;
                height: calc(100vh - 56px);
                overflow-y: auto;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-user-shield me-2"></i> Politeknik Elektronika Negeri Surabaya
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex ms-auto">
                    <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->

    <div class="dashboard">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active text-white" href="halmahasiswa.php"><i class="fas fa-user"></i> Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-white" href="materimahasiswa.php"><i class="fas fa-book"></i> Materi Kuliah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-white" href="jadwalmahasiswa.php"><i class="fas fa-calendar-alt"></i> Jadwal Kuliah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-white" href="tugasmahasiswa.php"><i class="fas fa-clipboard"></i> Tugas Kuliah</a>
            </li>
        </ul>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">

                <?php
                $no = 1;

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) {
                        $id_tugas = $data['id_tugas'];
                        $query_pengumpulan = "SELECT * FROM pengumpulan WHERE id_tugas = '$id_tugas'";
                        $result_pengumpulan = mysqli_query($koneksi, $query_pengumpulan);
                        $pengumpulan_data = mysqli_fetch_assoc($result_pengumpulan);
                ?>
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title">Tugas <?php echo $no++ ?>: <?php echo $data['judul']; ?></h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Deskripsi: <?php echo $data['deskripsi']; ?></p>
                                    <p class="card-text">Deadline: <?php echo $data['deadline']; ?></p>
                                    <?php if ($pengumpulan_data) { ?>
                                        <p style="color: green;">Sudah mengumpulkan pada: <?php echo $pengumpulan_data['waktu']; ?></p>
                                        <p>File yang diunggah: <?php echo $pengumpulan_data['file']; ?></p>
                                    <?php } else { ?>
                                        <p style="color: red;">Belum Mengumpulkan</p>
                                    <?php } ?>
                                    <p class="card-text">Nilai: <?php echo $data['nilai']; ?></p>

                                    <form method="post" action="submittugasmahasiswa.php" enctype="multipart/form-data">
                                        <input type="hidden" name="id_tugas" value="<?php echo $data['id_tugas']; ?>">
                                        <?php if ($pengumpulan_data) { ?>
                                            <input type="file" name="file" class="form-control" id="inputGroupFile01" required="required">
                                            <br>
                                            <button type="submit" name="submit" value="edit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Data</button>
                                        <?php } else { ?>
                                            <input type="file" name="file" class="form-control" id="inputGroupFile01" required="required">
                                            <br>
                                            <button type="submit" name="submit" value="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Unggah</button>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="col-md-12">
                        <p>Tidak ada data tugas yang tersedia</p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/90add86f1d.js" crossorigin="anonymous"></script>
</body>

</html>