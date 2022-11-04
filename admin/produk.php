<?php
session_start();
include 'function_produk.php';
if (!isset($_SESSION["submit"])) {
    header("location: index.php");
    exit;
}

if (isset($_POST['simpan'])) {
    addProduk($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Apotik Store Online </title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="dashboard.php">SISFO APOTIK</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">Settings</a>
                            <a class="dropdown-item" href="#">Activity Log</a> -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        
        <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Home</div>
                        <a class="nav-link" href="dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Data</div>

                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <a class="nav-link" href="produk.php">
                            <!-- <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div> -->
                            Produk
                        </a>
                        <a class="nav-link" href="perlengkapan.php">
                            <!-- <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div> -->
                            Perlengkapan Obat
                        </a>
                        <a class="nav-link" href="pelanggan.php">
                            <!-- <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div> -->
                            Pelanggan
                        </a>
                        <div class="sb-sidenav-menu-heading">Akun</div>
                        <a class="nav-link" href="user.php">
                            <!-- <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div> -->
                            Data Akun
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h4 class="mt-4">DATA PRODUK OBAT</h4>
                    <div class="card mb-4">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                + Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            <b>Tabel Produk Obat</b>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <thead>
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga</th>
                                                    <th>Stock</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            include "koneksi.php";
                                            $query = "SELECT * FROM obat";
                                            $sql = mysqli_query($conn, $query);
                                            $a = 1;
                                            foreach ($sql as $data) {
                                            ?>
                                        <tr align="center">
                                            <td><?= $a ?></td>
                                            <td align="left"><?= $data['namabarang'] ?></td>
                                            <td >Rp. <?= $data['harga'] ?></td>
                                            <td><?= $data['stock'] ?></td>
                                            <td><?= $data['keterangan'] ?></td>
                                            <td>
                                                <div class="card mb 1">
                                                    <div class="card-header">
                                                        <a href="edit_produk.php?id_barang=<?= $data['id_barang'] ?>" class="btn btn-primary">Ubah</a>
                                                        <a href="hapus_produk.php?id_barang=<?= $data['id_barang'] ?>" class="btn btn-primary" onclick="return confirm('Apakah Ingin Menghapus Data ? ');">Hapus</a>
                                                    </div>
                                            </td>
                                        </tr>
                                        <?php $a++; ?>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>


<!-- FORM INPUT -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="mt-4">DATA PRODUK OBAT</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">  
                        <input type="text" name="namabarang" placeholder="Masukan Nama Produk" autocomplete="off" class="form-control" autofocus require>
                    </div>

                    <div class="form-group"> 
                        <input type="text" name="harga" placeholder="Masukan Harga Produk" class="form-control" require>
                    </div>

                    <div class="form-group"> 
                        <input type="number" name="stock" placeholder="Masukan Stock Produk" class="form-control" require>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Gambar Produk</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto" accept="image/*">
                    </div>
                    <div class="form-group">
                        <textarea name="keterangan" cols="10" rows="5" class="form-control" placeholder="Keterangan" require></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="simpan" onclick="return confirm('Apakah Ingin Menambahkan ?');">Simpan</button>
                </div>
            </form>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

</html>