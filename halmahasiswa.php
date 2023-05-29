<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: loginmahasiswa.php");
    exit;
}

include 'koneksi.php';
$id_mahasiswa = $_SESSION["id_mahasiswa"]; // Ambil ID mahasiswa dari session

$query = "SELECT * FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result); // Ambil data mahasiswa

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
        <h1>Selamat Datang, <?php echo $data['Nama']; ?></h1>
        <br>
        <div class="card">
            <div class="card-header">
                <h5>Profile Mahasiswa</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="gambar/<?php echo $data['foto']; ?>" width="150" height="190">
                    </div>
                    <div class="col-md-10">
                        <p>NRP: <?php echo $data['NRP']; ?></p>
                        <p>Nama Lengkap: <?php echo $data['Nama']; ?></p>
                        <p>Jenis Kelamin: <?php echo $data['Jenis_Kelamin']; ?></p>
                        <p>Jurusan: <?php echo $data['Jurusan']; ?></p>
                        <p>Email Student: <?php echo $data['Email_Student']; ?></p>
                        <p>Alamat: <?php echo $data['Alamat']; ?></p>
                        <p>No.Hp: <?php echo $data['No_HP']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/90add86f1d.js" crossorigin="anonymous"></script>
</body>

</html>
