<?php
include "koneksi.php";
error_reporting(0);
// Jika pengguna belum login, arahkan ke login.php

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit(); // Pastikan tidak ada eksekusi lanjutan
}
// Simpan role pengguna dari sesi
$role = isset($_SESSION['user']['role']) ? $_SESSION['user']['role'] : 'pelanggan';
$nama = isset($_SESSION['user']['nama']) ? $_SESSION['user']['nama'] : 'User';

$id_pelanggan = null;
if (isset($_SESSION['pelanggan'])) {
    $pelanggan = $_SESSION['pelanggan'];
    $id_pelanggan = isset($pelanggan['id_pelanggan']) ? $pelanggan['id_pelanggan'] : null;
}


// Jika pelanggan mencoba mengakses index.php, redirect ke homepage.php atau halaman pelanggan


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3">Aplikasi Kasir</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= ($role == 'pelanggan' || $role == 'kasir') ? '?page=homepage' : 'index.php'; ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if ($role == 'admin') { ?>
                <div class="sidebar-heading">Manajemen</div>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="?page=pelanggan">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Pelanggan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="?page=pelanggan_tambah">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Tambah Pelanggan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="?page=produk">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="?page=produk_tambah">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Tambah Produk</span>
                    </a>
                </li>
            <?php } ?>
            <!-- Jika Admin & Supervisor -->
            <?php if ($role == 'supervisor') { ?>
                <div class="sidebar-heading">Manajemen</div>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="?page=pelanggan">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Pelanggan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="?page=produk">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="?page=produk_tambah">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Tambah Produk</span>
                    </a>
                </li>

            <?php } ?>

            <!-- Jika Admin, Supervisor, & Kasir -->
            <?php if ($role == 'admin' || $role == 'supervisor' || $role == 'kasir') { ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="?page=pembelian_tambah">
                        <i class="fas fa-fw fa-plus-square"></i>
                        <span>Penjualan</span>
                    </a>
                </li>
            <?php } ?>
            <!-- Semua pengguna (admin, supervisor, kasir, pelanggan) bisa melihat histori pembelian -->
            <?php if ($role == 'kasir' || $role == 'admin') { ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="?page=pembelian">
                        <i class="fas fa-fw fa-plus-square"></i>
                        <span>Histori Transaksi</span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($role == 'pelanggan') { ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="?page=pelanggan_histori">
                        <i class="fas fa-fw fa-plus-square"></i>
                        <span>Histori Transaksi</span>
                    </a>
                </li>
            <?php } ?>
            
        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- LOGOUT -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php

                                    if (isset($_SESSION['user']['nama']) && $_SESSION['user']['nama']) {
                                        $nama_tampil = ucwords($_SESSION['user']['nama']);
                                        if (isset($_SESSION['user']['role'])) {
                                            $nama_tampil .= " (" . ucfirst($_SESSION['user']['role']) . ")";
                                        }
                                    } elseif (isset($_SESSION['pelanggan']['nama_pelanggan']) && $_SESSION['pelanggan']['nama_pelanggan']) {
                                        $nama_tampil = ucwords($_SESSION['pelanggan']['nama_pelanggan']);
                                    }

                                    echo htmlspecialchars($nama_tampil);
                                    ?>
                                </span>

                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- DROPDOWN LOGOUT -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Logout?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Tekan tombol "Logout" di bawah jika kamu ingin mengakhiri sesi ini.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="login.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                include $page . '.php';
                ?>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>