<?php
include "koneksi.php";

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['name'];
    $role = $_POST['role']; // Pilihan role saat register

    $insert = mysqli_query($koneksi, "INSERT INTO user (nama, username, password, role) VALUES ('$nama', '$username', '$password', '$role')");

    if ($insert) {
        echo '<script>alert("Registration Success!"); window.location.href="index.php?page=home"</script>';
    } else {
        echo '<script>alert("Registrasi gagal! Coba lagi.")</script>';
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
    </div>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Registrasi User</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <form class="form" method="POST">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input class="form-control" type="text" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Username</label>
                                <input class="form-control" type="text" name="username" row="2" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Password</label>
                                <input class="form-control" type="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <select class="form-control form-control mt-3" name="role"  required>
                                    <option value="" selected disabled class="text-bold">Pilih Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="supervisor">Supervisor</option>
                                    <option value="kasir">Kasir</option>
                                </select>
                            </div>
                            <a href="?page=user" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>