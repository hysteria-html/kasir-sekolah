<?php
    $id = $_GET['id'];
    if(isset($_POST['nama_pelanggan'])) {
        $nama = $_POST['nama_pelanggan'];
        $alamat = $_POST['alamat'];
        $no_telepon = $_POST['no_telepon'];

        $query = mysqli_query($koneksi, "UPDATE pelanggan set nama_pelanggan='$nama', alamat='$alamat', no_telepon = '$no_telepon' WHERE id_pelanggan = $id");
        if($query){
            echo '<script>alert("Ubah data berhasil"); location.href="?page=pelanggan"</script>';
        } else {
            echo '<script>alert("Ubah data gagal"); location.href="?page=pelanggan"</script>';
        }
    }

    $query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan=$id");
    $data = mysqli_fetch_array($query);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></a>
    </div>      
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Ubah Data</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <form class="form" method="POST">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input value="<?php echo $data['nama_pelanggan']; ?>"class="form-control"type="text" name="nama_pelanggan">
                            </div>
                            <div class="form-group">
                                <label for="name">Alamat</label>
                                <input value="<?php echo $data['alamat']; ?>" class="form-control" type="alamat" name="alamat" row="2">
                            </div>
                            <div class="form-group">
                                <label for="name">No Telepon</label>
                                <input value="<?php echo $data['no_telepon']; ?>" class="form-control" type="number" name="no_telepon">
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
