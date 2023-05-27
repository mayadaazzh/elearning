<?php

include 'koneksi.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Regis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
<body style="background-image: url('IMG-20230505-WA0010.jpg'); background-size: cover;">
    <div class="atas" style="margin-top: 100px;"></div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="card">
                <div class="card-header text-light text-center">
                    <img src="logoweb.png" width="160" height="45">
                </div>
                    <div class="card-body">

                        <?php
                        function registrasi($data)
                        {
                            global $koneksi;
                            $username = $data["username"];
                            $password = $data["password"];
                            $password2 = $data["password2"];

                            // cek username gaoleh podo
                            $usernameUser = mysqli_query($koneksi, "SELECT username FROM dosen WHERE username ='$username'");

                            if (mysqli_fetch_assoc($usernameUser)) {
                                echo "<div class='alert alert-danger' role='alert'>username sudah terdaftar, masukkan username baru!</div>";
                                return false;
                            }

                            //cek konfirmasi pw
                            if ($password !== $password2) {
                                echo "<div class='alert alert-danger' role='alert'>password tidak sesuai, ulangi lagi</div>";
                                return false;
                            }

                            // enkripsi dulu pw nya
                            // $password = md5($password);
                            $password = password_hash($password, PASSWORD_DEFAULT);

                            // lalu tambah ke database
                            mysqli_query($koneksi, "INSERT INTO dosen (username, password) VALUES('$username', '$password')");

                            return mysqli_affected_rows($koneksi);
                        }

                        if (isset($_POST["register"])) {
                            if (registrasi($_POST) > 0) {
                                echo "<script>alert('akun telah berhasil didaftarkan');window.location = 'logindosen.php';</script>";
                            } else {
                                echo mysqli_error($koneksi);
                            }
                        }
                        ?>

                        <form action="" method="post">
                            <br>
                            <div class="input-group">
                                <span for="username" class="input-group-text"> <i class="fa-solid fa-user" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" id="username" name="username" placeholder="masukkan username">
                            </div>
                            <br>
                            <div class="input-group">
                                <span for="password" class="input-group-text"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="masukkan password">
                            </div>
                            <br>
                            <div class="input-group">
                                <span for="password" class="input-group-text"><i class="fa-solid fa-repeat" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="konfirmasi ulang password">
                            </div>
                            <br>
                            <button style="width: 100%;" name="register" type="submit" class="btn btn-dark">REGISTER</button>
                            <hr>
                            <div class="row justify-content-center mt-3">
                                <div class="col-md-8 text-center">
                                    <p>Sudah punya akun? <a href="logindosen.php">Login</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/90add86f1d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>