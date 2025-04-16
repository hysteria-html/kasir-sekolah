<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

 <?php if ($role != "pelanggan") { ?>
            <div class="row mb-3">
        
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-lg-6 mb-4">
                    <div class="card border-left-primary shadow-sm h-200 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Produk</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM produk")) ?> Produk</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-lg-6 mb-4">
                    <div class="card border-left-success shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Sales</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$1,000,000,00</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                    
<?php } ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Produk</h5>
            </div>
            <div class="card-body">
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <!-- <th>Username</th> -->
                            <th>Harga</th>
                            <th>Stok</th>
                            <?php if($role != 'pelanggan' && $role != 'kasir'){ ?>
                            <th>Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot> -->
                    <tbody>
                        <?php
                            $query  = mysqli_query($koneksi, "SELECT * FROM produk");
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td class="text-capitalize"><?php echo $data['nama_produk']?></td>
                                <td ><?php echo $data['harga']?></td>
                                <td class="text-capitalize"><?php echo $data['stok']?></td>
                                <?php if($role != 'pelanggan' && $role != 'kasir') { ?>
                                <td>
                                    <a href="?page=produk_edit&&id=<?php $data['id_produk'];?>" class ="btn btn-primary">Ubah</a>
                                    <a href="?page=produk_hapus&&id=<?php $data['id_produk'];?>" class ="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                    ?>            
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>