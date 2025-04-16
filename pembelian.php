<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <data class="h3 mb-0 text-gray-800">Histori Pembelian</data>
    </div>      
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Data Pembelian</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pembelian</th>
                            <th>Pelanggan</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query  = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan on pelanggan.id_pelanggan = penjualan.id_pelanggan");
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['tanggal_penjualan']; ?></td>
                                <td><?php echo $data['nama_pelanggan']; ?></td>
                                <td><?php echo $data['total_harga']; ?></td>
                                <td>
                                    <a href="?page=pembelian_detail&&id=<?php echo $data['id_penjualan']; ?>" class="btn btn-primary btn-user">Detail</a>   
                                    <?php if ($role != "pelanggan" && $role != "kasir") { ?>
                                        <a href="?page=penjualan_hapus&&id=<?php echo $data['id_penjualan']; ?>" class="btn btn-danger" >Hapus</a>                            
                                        <?php } ?>                        
                                </td>
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


