<?php
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Pastikan metode enkripsi sama dengan di database
    
    // Cek apakah login sebagai admin/kasir (dari tabel user)
    $cek_admin = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    
    // Cek apakah login sebagai pelanggan (dari tabel pelanggan)
    $cek_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE username='$username' AND password='$password'");
    
    // Jika ditemukan di tabel user (admin/kasir)
    if (mysqli_num_rows($cek_admin) > 0) {
        $data = mysqli_fetch_array($cek_admin);
        $_SESSION['user'] = $data;
        $_SESSION['role'] = $data['role']; // Simpan role di session
        $_SESSION['login_type'] = 'user'; // Tandai jenis login
        
        // Redirect berdasarkan role
        if ($data['role'] == 'kasir') {
            echo '<script>alert("Selamat Datang, ' . $data['nama'] . '!"); window.location.href="index.php?page=homepage";</script>';
        } else {
            echo '<script>alert("Selamat Datang, ' . $data['nama'] . '!"); window.location.href="index.php?page=home";</script>';
        }
    } 
    // Jika ditemukan di tabel pelanggan
    else if (mysqli_num_rows($cek_pelanggan) > 0) {
        $pelanggan = mysqli_fetch_array($cek_pelanggan);
        
        // Simpan data pelanggan ke session
        $_SESSION['user'] = $pelanggan; // Gunakan session user yang sama untuk konsistensi
        $_SESSION['pelanggan'] = $pelanggan; // Tetap simpan untuk kompatibilitas
        $_SESSION['role'] = 'pelanggan'; // Menandai bahwa ini adalah session pelanggan
        $_SESSION['login_type'] = 'pelanggan'; // Tandai jenis login
        
        // Arahkan ke halaman histori transaksi pelanggan
        echo '<script>alert("Selamat Datang, ' . $pelanggan['nama'] . '!"); window.location.href="index.php?page=homepage";</script>';
    } 
    else {
        echo '<script>alert("Username atau Password Salah!")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Sistem</title>
    <link rel="stylesheet" href="css/login-1.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <!-- Background image area -->
                </div>
                <div class="col-md-6 right">
                    <div class="input-box">
                        <header>Login Sistem</header>
                        <form class="user" method="POST">
                            <div class="form-group">
                                <input class="form-control form-control-user" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <p class="small">Belum punya akun? <a href="register.php">Buat Akun!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>