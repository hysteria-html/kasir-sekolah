<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Data User</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- <a href="?page=pembelian_tambah" class="btn btn-primary py-2">Tambah Data</a>
<hr> -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <?php if ($role != "supervisor") { ?>
                                <th>Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot> -->
                    <tbody>
                        <?php
                        $query  = mysqli_query($koneksi, "SELECT * FROM user");
                        $no = 1;
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['role']; ?></td>
                                <?php if ($role != "supervisor") { ?>
                                    <td>
                                        <a href="?page=user_hapus&&id=<?php echo $data['id_user']; ?> " class="btn btn-danger">Hapus</a>
                                    </td>
                                <?php } ?>
                            </tr>


                        <?php } ?>
                    </tbody>
                </table>
                <a class="btn btn-primary btn-user px-4 py-2" href="?page=user_tambah">+ Tambah</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>