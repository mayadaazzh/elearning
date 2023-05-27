

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Dosen</title>
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
                <a class="nav-link active text-white" href="haldosen.php"><i class="fas fa-user"></i> Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-white" href="uploadmateri.php"><i class="fas fa-book"></i> Materi Kuliah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-white" href="jadwalmahasiswa.php"><i class="fas fa-calendar-alt"></i> Jadwal Kuliah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-white" href="uploadtugas.php"><i class="fas fa-clipboard"></i> Tugas Kuliah</a>
            </li>

        </ul>
    </div>