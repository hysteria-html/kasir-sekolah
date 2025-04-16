<?php

include 'koneksi.php';


if (!isset($_SESSION['pelanggan'])) {
    header("location: pelanggan_login.php");
    exit();
}

$pelanggan = $_SESSION['pelanggan'];
$id_pelanggan = $pelanggan['id_pelanggan'];
?>

<!-- Konten Halaman -->
<div class="container-fluid">

    <!-- Judul Halaman -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Histori Transaksi</h1>
    </div>

    <!-- Baris Konten -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Transaksi Anda</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Ambil data transaksi pelanggan
                                $query = "SELECT * FROM penjualan WHERE id_pelanggan='$id_pelanggan' ORDER BY tanggal_penjualan DESC";
                                $result = mysqli_query($koneksi, $query);
                                
                                if ($result && mysqli_num_rows($result) > 0) {
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($result)) {
                                        $id_penjualan = $data['id_penjualan'];
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo date('d F Y', strtotime($data['tanggal_penjualan'])); ?></td>
                                        <td>Rp <?php echo number_format($data['total_harga'], 0, ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <strong>Detail Transaksi:</strong>
                                            <table class="table table-bordered mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Produk</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga Satuan</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $detail_query = "SELECT dp.*, p.nama_produk, p.harga 
                                                                   FROM detail_penjualan dp 
                                                                   JOIN produk p ON dp.id_produk = p.id_produk 
                                                                   WHERE dp.id_penjualan = '$id_penjualan'";
                                                    $detail_result = mysqli_query($koneksi, $detail_query);
                                                    
                                                    if ($detail_result && mysqli_num_rows($detail_result) > 0) {
                                                        $no_detail = 1;
                                                        while ($detail = mysqli_fetch_array($detail_result)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no_detail++; ?></td>
                                                            <td><?php echo $detail['nama_produk']; ?></td>
                                                            <td><?php echo $detail['jumlah_produk']; ?></td>
                                                            <td>Rp <?php echo number_format($detail['harga'], 0, ',', '.'); ?></td>
                                                            <td>Rp <?php echo number_format($detail['sub_total'], 0, ',', '.'); ?></td>
                                                        </tr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='5' class='text-center'>Tidak ada detail produk</td></tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='3' class='text-center'>Belum ada transaksi</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk tabel -->
<script>
$(document).ready(function() {
    // Pastikan tabel berjalan baik
    $('#dataTable').DataTable();
});
</script>