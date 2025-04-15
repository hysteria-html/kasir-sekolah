<?php
    if(isset($_POST['nama_pelanggan'])) {
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $alamat = $_POST['alamat'];
        $no_telepon = $_POST['no_telepon'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); // Menggunakan MD5 sesuai dengan sistem yang sudah ada
        
        // Cek apakah username sudah digunakan
        $check = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE username='$username'");
        if(mysqli_num_rows($check) > 0) {
            echo '<script>alert("Username sudah digunakan. Silakan gunakan username lain.");</script>';
        } else {
            $query = mysqli_query($koneksi, "INSERT INTO pelanggan (nama_pelanggan, alamat, no_telepon, username, password) 
                     VALUES ('$nama_pelanggan','$alamat','$no_telepon','$username','$password')");
            if($query){
                echo '<script>alert("Data pelanggan berhasil ditambahkan");location.href="?page=pelanggan"</script>';
            } else {
                echo '<script>alert("Data pelanggan gagal ditambahkan"); location.href="?page=pelanggan"</script>';
            }
        }
    }
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>
    </div>      
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Tambah Data</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <form class="form" method="POST">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input class="form-control" type="text" name="nama_pelanggan" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Alamat</label>
                                <input class="form-control" type="text" name="alamat" row="2" required>
                            </div>
                            <div class="form-group">
                                <label for="name">No Telepon</label>
                                <input class="form-control" type="number" name="no_telepon" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username untuk Pelanggan</label>
                                <input class="form-control" type="text" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password untuk Pelanggan</label>
                                <input class="form-control" type="password" name="password" required>
                            </div>
                            <a href="?page=pelanggan" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>                
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>