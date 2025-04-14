<?php
    include 'koneksi.php';

    
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <data class="h3 mb-0 text-gray-800">Add Pelanggan</data>
    </div>      
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tambah Data</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control " type="text" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control " type="password" name="password">
                    </div>

                    <div class="form-group">
                        <label for="username">Nama</label>
                        <input class="form-control form-control-user" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input class="form-control " type="text" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">No Telepon</label>
                        <input class="form-control " type="text" name="no_telepon">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-user">Submit</button>
                        <button type="submit" class="btn btn-primary btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- <div class="table-responsive">
                <a href="?page=pelanggan_tambah" class="btn btn-primary py-2">Tambah Data</a>
                <hr>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>                        
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php 
                            $query  = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama_pelanggan']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['no_telepon']; ?></td>
                                <td>
                                    <a href="?page=pelanggan_ubah&&id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-secondary">Edit</a>                            
                                    <a href="?page=pelanggan_hapus&&id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-danger" >Hapus</a>                            
                                </td>
                            </tr>
                        <?php 
                        }
                    ?>
                </tbody>
                </table>
            </div> -->
        </div>
    </div>
</div>  
