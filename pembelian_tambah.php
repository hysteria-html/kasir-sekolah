<?php
    if(isset($_POST['produk']) && !empty($_POST['produk'])) { // Pastikan produk dikirimkan
        $id_pelanggan = $_POST['id_pelanggan'];
        $produk = $_POST['produk'];
        $total = 0;
        $tanggal = date('Y/m/d');

        // Insert ke tabel penjualan
        $query = mysqli_query($koneksi, "INSERT INTO penjualan(tanggal_penjualan, id_pelanggan) VALUES ('$tanggal', '$id_pelanggan')");

        if (!$query) {
            die("Error Insert Penjualan: " . mysqli_error($koneksi));
        }

        $id_penjualan = mysqli_insert_id($koneksi); // Ambil ID terakhir

        foreach ($produk as $key => $val) {
            if ($val > 0) { // Pastikan jumlah produk lebih dari 0
                $pr = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$key'"));

                $sub = $val * $pr['harga'];
                $total += $sub;

                // Insert ke tabel detail_penjualan
                $query = mysqli_query($koneksi, "INSERT INTO detail_penjualan(id_penjualan, id_produk, jumlah_produk, sub_total) VALUES('$id_penjualan', '$key', '$val', '$sub')");

                if (!$query) {
                    die("Error Insert Detail Penjualan: " . mysqli_error($koneksi));
                }

                // Update stok produk
                $updateProduk = mysqli_query($koneksi, "UPDATE produk SET stok = stok - $val WHERE id_produk = '$key'");

                if (!$updateProduk) {
                    die("Error Update Stok: " . mysqli_error($koneksi));
                }
            }
        }

        // Update total harga di tabel penjualan
        $query = mysqli_query($koneksi, "UPDATE penjualan SET total_harga = '$total' WHERE id_penjualan = '$id_penjualan'");

        if (!$query) {
            die("Error Update Total Harga: " . mysqli_error($koneksi));
        }

        echo '<script>alert("Data berhasil ditambahkan"); location.href ="?page=pembelian"</script>';
    }
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pembelian</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></a>
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
                                <label for="name">Nama Pelanggan</label>
                                <select class="form-control" name="id_pelanggan" id="">
                                    <!-- <input class="form-control"type="text" name="nama_produk"> -->
                                    <?php 
                                        $p = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                                        while($pel = mysqli_fetch_array($p)){
                                            ?>
                                            <option value="<?php echo $pel['id_pelanggan']; ?>"><?php echo $pel['nama_pelanggan']; ?></option>                                            
                                            <?php 
                                        }
                                    ?>
                                </select>
                            </div>
                            <?php 
                                $pro = mysqli_query($koneksi, "SELECT * FROM produk");
                                while($produk = mysqli_fetch_array($pro)){                                    
                                ?>
                            <div class="form-group">
                                <label for="name"><?php echo $produk['nama_produk'] . ' (Stock : '.$produk['stok'].')';?></label>
                                <input class="form-control" step="0" value="0" max="<?php echo $produk['stok']; ?>" type="number" name="produk[<?php echo $produk['id_produk']; ?>]">
                            </div>
                            <?php 
                            }
                            ?>
                            <!-- <div class="form-group">
                                <label for="name">Stok</label>
                                <input class="form-control" type="number" name="stok">
                            </div> -->
                            <a href="?page=pembelian" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>                
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
