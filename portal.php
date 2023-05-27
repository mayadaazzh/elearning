<!DOCTYPE html>
<html>
<head>
  <title>Portal E-Learning - Politeknik Elektronika Negeri Surabaya</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      background-color: #333333;
      color: #fff;
    }

    .container {
      margin-top: 50px;
      text-align: center;
    }

    .card {
      background-color: #000;
      color: #fff;
    }

    .card-title {
      font-weight: bold;
      font-size: 24px;
      margin-bottom: 15px;
    }

    .card-text {
      font-size: 18px;
      margin-bottom: 20px;
    }

    .btn {
      background-color: #FF8C00;
      border: none;
    }

    .btn:hover {
      background-color: #FFA500;
    }

    .portal-title {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 50px;
    }
    
    .card-icon {
      font-size: 48px;
      color: #FF8C00;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="portal-title">Portal E-learning Politeknik Elektronika Negeri Surabaya</h1>

    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body text-center">
            <i class="fas fa-user-graduate card-icon"></i>
            <h5 class="card-title">Admin</h5>
            <p class="card-text">Login sebagai admin</p>
            <a href="login.html" class="btn btn-primary">Login <i class="fas fa-sign-in-alt"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body text-center">
            <i class="fas fa-chalkboard-teacher card-icon"></i>
            <h5 class="card-title">Dosen</h5>
            <p class="card-text">Login sebagai dosen</p>
            <a href="logindosen.php" class="btn btn-primary">Login <i class="fas fa-sign-in-alt"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body text-center">
            <i class="fas fa-user-graduate card-icon"></i>
            <h5 class="card-title">Mahasiswa</h5>
            <p class="card-text">Login sebagai mahasiswa</p>
            <a href="logindosen.php" class="btn btn-primary">Login <i class="fas fa-sign-in-alt"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
