<!-- DataTales Example -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <data class="h3 mb-0 text-gray-800">Pelanggan</data>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Data Pelanggan</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <!-- <th>Username</th> -->
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
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
                            $query  = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td class="text-capitalize"><?php echo $data['nama_pelanggan']?></td>
                                <!-- <td><?php echo $data['username']?></td> -->
                                <td class="text-capitalize"><?php echo $data['alamat']?></td>
                                <td><?php echo $data['no_telepon']?></td>
                                <td>
                                <a href="?page=pelanggan_ubah&&id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-primary">Edit</a>                            
                                <a href="?page=pelanggan_hapus&&id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-danger" >Hapus</a>
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