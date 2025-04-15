<?php
include "koneksi.php";

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['name'];
    $role = $_POST['role']; // Pilihan role saat register

    $insert = mysqli_query($koneksi, "INSERT INTO user (nama, username, password, role) VALUES ('$nama', '$username', '$password', '$role')");

    if ($insert) {
        echo '<script>alert("Registration Success!"); location.href="login.php"</script>';
    } else {
        echo '<script>alert("Registrasi gagal! Coba lagi.")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SB Admin 2 - Register</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login-1.css">
</head>

<body>

    <body>
        <div class="wrapper">
            <div class="container main">
                <div class="row">
                    <div class="col-md-6 side-image">
                        <!-- <img src="images/minimalist-purple-oarsgiaytbnr6dj1.jpg" alt=""> -->
                    </div>
                    <div class="col-md-6 right">
                        <div class="input-box">
                            <header class="h4">Create Account </header>
                            <form class="user" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="name" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-user" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                                </div>
                                <!-- Field select untuk memilih role -->
                                <div class="form-group">
                                    <select class="form-control form-control-sm" name="role"  required>
                                        <option value="" selected disabled>Pilih Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="supervisor">Supervisor</option>
                                        <option value="kasir">Kasir</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Register Staff</button>
                            </form>
                            <div class="text-center mt-3">
                                <p class="small">Already have account? <a href="login.php">Login!</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>