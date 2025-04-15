<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <data class="h3 mb-0 text-gray-800">Produk/Barang</data>
    </div>      
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Data Produk</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stock</th>
                            <?php if($role != 'kasir'){ ?>
                                <th>Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query  = mysqli_query($koneksi, "SELECT * FROM produk");
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama_produk']; ?></td>
                                <td><?php echo $data['harga']; ?></td>
                                <td><?php echo $data['stok']; ?></td>
                                <?php if($role != 'kasir'){ ?>
                                    <td>
                                        <a href="?page=produk_ubah&&id=<?php echo $data['id_produk']; ?>" class="btn btn-primary">Edit</a>                            
                                        <a href="?page=produk_hapus&&id=<?php echo $data['id_produk']; ?>" class="btn btn-danger" >Hapus</a>                            
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php 
                        }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>  
