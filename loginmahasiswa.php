<?php
session_start();
include 'koneksi.php';

// cek cookie
if (isset($_COOKIE['login']) && $_COOKIE['login'] == 'true') {
    $_SESSION['login'] = true;
}

if (isset($_POST['login'])) {
    global $koneksi;

    $username = $_POST["username"];
    $password = $_POST["password"];

    $cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username = '$username'");

    if (mysqli_num_rows($cek) == 1) {
        $cekPw = mysqli_fetch_assoc($cek);
        if (password_verify($password, $cekPw["password"])) {
            $_SESSION["login"] = true;

            // Simpan id_mahasiswa ke dalam session
            $_SESSION["id_mahasiswa"] = $cekPw["id_mahasiswa"];

            // Set cookies
            if (isset($_POST['remember'])) {
                setcookie('login', 'true', time() + 60);
            }

            header("Location: halmahasiswa.php");
            exit;
        }
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

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
                        if (isset($error)) {
                            echo "<div class='alert alert-danger' role='alert'>Password wrong, please try again!</div>";
                        }
                        ?>
                        <form action="" method="post">
                            <br>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-user" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username Anda">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password Anda">
                            </div>
                            <br>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Always remember</label>
                            </div>
                            <button style="width: 100%;" class="btn btn-dark" type="submit" name="login" href="halmahasiswa.php?id_mahasiswa=<?php echo $cekPw['id_mahasiswa'];?>">LOGIN</button>
                        </form>
                        <hr>
                        <p class="text-center">Belum punya akun? <a href="regis.php">Daftar</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/90add86f1d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
