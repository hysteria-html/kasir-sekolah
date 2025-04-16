<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        // Ambil data penjualan
        $query = mysqli_query($koneksi, "SELECT penjualan.*, pelanggan.nama_pelanggan 
                                         FROM penjualan 
                                         LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan 
                                         WHERE id_penjualan = '$id'");
        $data = mysqli_fetch_array($query);

        // Ambil detail produk
        $detail_query = mysqli_query($koneksi, "SELECT detail_penjualan.*, produk.nama_produk, produk.harga 
                                                FROM detail_penjualan 
                                                LEFT JOIN produk ON produk.id_produk = detail_penjualan.id_produk 
                                                WHERE detail_penjualan.id_penjualan = '$id'");
    } else {
        echo "<script>alert('ID penjualan tidak ditemukan!'); location.href='index.php?page=pembelian';</script>";
        exit;
    }
?>


<div class="container-fluid text-center">
    <button class="btn btn-primary w-100 py-5" data-bs-toggle="modal" data-bs-target="#strukModal">
        Tampilkan Struk
    </button>

    <!-- Modal -->
    <div class="modal fade" id="strukModal" tabindex="-1" aria-labelledby="strukModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="strukModalLabel">Struk Pembelian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center"><?php echo date('d/m/Y H:i'); ?></p>
                    <p><strong>Pelanggan:</strong> </p>
                    <h3><?php echo $data['nama_pelanggan']; ?></h3>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $total = 0;
                                while($row = mysqli_fetch_array($detail_query)) {
                                    $subtotal = $row['jumlah_produk'] * $row['harga'];
                                    $total += $subtotal;
                                    ?>
                                        <tr>
                                            <td><?php echo $row['nama_produk']; ?></td>
                                            <td><?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                                            <td><?php echo $row['jumlah_produk']; ?></td>
                                            <td><?php echo number_format($subtotal, 0, ',', '.'); ?></td>
                                          </tr>;
                                    <?php
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Total</th>
                                <th>Rp <?php echo number_format($total, 0, ',', '.'); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button onclick="window.print()" class="btn btn-primary">Cetak Struk</button>
                </div>
            </div>
        </div>
    </div>
</d>
