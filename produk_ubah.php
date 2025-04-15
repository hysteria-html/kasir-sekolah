<?php
    $id = $_GET['id'];
    if(isset($_POST['nama_produk'])) {
        $nama = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $query = mysqli_query($koneksi, "UPDATE produk set nama_produk='$nama', harga ='$harga', stok='$stok' WHERE id_produk = $id");
        if($query){
            echo '<script>alert("Ubah data berhasil"); location.href ="?page=produk"</script>';
        } else {
            echo '<script>alert("Ubah data gagal"); location.href ="?page=produk"</script>';
        }
    }

    $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk=$id");
    $data = mysqli_fetch_array($query);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Produk/Barang</h1>
    </div>      
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Ubah Data </h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <form class="form" method="POST">
                            <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input value="<?php echo $data['nama_produk']; ?>"class="form-control"type="text" name="nama_produk">
                            </div>
                            <div class="form-group">
                                <label for="name">Harga</label>
                                <input value="<?php echo $data['harga']; ?>"class="form-control"type="alamat" name="harga" row="2">
                            </div>
                            <div class="form-group">
                                <label for="name">Stok</label>
                                <input value="<?php echo $data['stok']; ?>" class="form-control" type="number" name="stok">
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
