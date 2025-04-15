<?php
if (isset($_POST['nama_produk'])) {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];


    $query = mysqli_query($koneksi, "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama','$harga','$stok')");
    if ($query) {
        echo '<script>alert("Data pelanggan berhasil ditambahkan");location.href="?page=produk"</script>';
    } else {
        echo '<script>alert("Data pelanggan gagal ditambahkan"); location.href="?page=produk"</script>';
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Produk</h1>
    </div>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Tambah Data Produk</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <form class="form" method="POST">
                            <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input class="form-control" type="text" name="nama_produk" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Harga</label>
                                <input class="form-control" type="text" name="harga" row="2" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Stok</label>
                                <input class="form-control" type="text" name="stok" required>
                            </div>
                            <a href="?page=produk" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>