<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:index.php");
    exit;
}
?>

<?php
include 'config.php';

$id_buku = $_GET['id_buku'];

$query = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
$result = mysqli_query($koneksi, $query);

$item = '';

if (mysqli_num_rows($result) == 1) {
    $item = mysqli_fetch_assoc($result);
}
?>

<?php
include 'randomcode.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="img/is1.png" rel="icon">
    <title>BUKU</title>
    <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="bootstrap.min.css" rel="stylesheet">
</head>


<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon ">
                    <img src="img/is1.png" alt="" style="max-width: 30px;">

                </div>
                <div class="sidebar-brand-text mx-3">GARIS BOOK STORE</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item" style="margin-top: 75%;">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-door-open"></i>
                    <span>Beranda</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-info-circle"></i>
                    <span>Informasi</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data</h6>
                        <hr class="sidebar-divider my-0  bg-gradient-primary">
                        <a class="collapse-item active" href="buku.php">Buku</a>
                        <a class="collapse-item" href="kategori.php">Kategori</a>
                        <a class="collapse-item" href="penerbit.php">Penerbit</a>
                        <a class="collapse-item" href="pengarang.php">Pengarang</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tr" aria-expanded="true" aria-controls="tr">
                    <i class="fas fa-money-check"></i>
                    <span>Transaksi</span>
                </a>
                <div id="tr" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data</h6>
                        <hr class="sidebar-divider my-0  bg-gradient-primary">
                        <a class="collapse-item" href="transaksi.php?randomcode=<?php echo $randomcode ?>">Nota</a>
                        <a class="collapse-item" href="transaksilaporan.php">Daftar Transaksi</a>
                    </div>
                </div>
            </li>
            <div style="margin-top: 10px" class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
            </div>

            <!-- Isi Konten -->
            <div id="content" class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Buku</h1>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Informasi</a></li>
                            <li class="breadcrumb-item"><a href="buku.php" class="breadcrumb-link">Data Buku</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Data Buku</li>
                        </ol>
                    </nav>
                </div>

                <!-- Form -->
                <form action="buku_edit.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Cover Buku</h6>
                                </div>
                                <div class="card-body m-1">
                                    <img class="img-fluid mx-auto d-block mb-4" src="images/<?php echo $item['gambar'] ?>" width="335px">

                                    <div class="container-fluid">
                                        <input id="customFile" type="file" name="gambar" class="form-control-file">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Buku</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">ID Buku</label>
                                        <div class="col-md-9">
                                            <input type="text" name="id_buku" class="form-control" value="<?php echo $id_buku ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Judul Buku</label>
                                        <div class="col-md-9">
                                            <input type="text" name="judul_buku" class="form-control" placeholder="Judul Buku" value="<?php echo $item['judul_buku'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Pengarang</label>
                                        <div class="col-md-9">
                                            <select required name="id_pengarang" class="form-control">
                                                <option value="" disabled selected>--</option>
                                                <?php
                                                $tampilkan_isi = "select * from pengarang";
                                                $tampilkan_isi_sql = mysqli_query($koneksi, $tampilkan_isi);
                                                $no = 1;
                                                $tag = '';

                                                while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                                                    if ($item['id_pengarang'] == $isi['id_pengarang']) {
                                                        $tag = 'selected';
                                                    } else {
                                                        $tag = '';
                                                    }
                                                    echo "<option value='" . $isi['id_pengarang'] . "'" . $tag . ">" . $isi['nama_pengarang'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Penerbit</label>
                                        <div class="col-md-9">
                                            <select required name="id_penerbit" class="form-control" required>
                                                <option value="" disabled selected>--</option>
                                                <?php
                                                $tampilkan_isi = "select * from penerbit";
                                                $tampilkan_isi_sql = mysqli_query($koneksi, $tampilkan_isi);
                                                $no = 1;

                                                while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                                                    if ($item['id_penerbit'] == $isi['id_penerbit']) {
                                                        $tag = 'selected';
                                                    } else {
                                                        $tag = '';
                                                    }
                                                    echo "<option value='" . $isi['id_penerbit'] . "'" . $tag . ">" . $isi['nama_penerbit'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Kategori</label>
                                        <div class="col-md-9">
                                            <select required name="id_kategori" class="form-control" required>
                                                <option value="" disabled selected>--</option>
                                                <?php
                                                $tampilkan_isi = "select * from kategori";
                                                $tampilkan_isi_sql = mysqli_query($koneksi, $tampilkan_isi);
                                                $no = 1;

                                                while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                                                    if ($item['id_kategori'] == $isi['id_kategori']) {
                                                        $tag = 'selected';
                                                    } else {
                                                        $tag = '';
                                                    }
                                                    echo "<option value='" . $isi['id_kategori'] . "'" . $tag . ">" . $isi['nama_kategori'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Stok</label>
                                        <div class="col-md-9">
                                            <input type="number" name="stok" class="form-control" placeholder="Stok" value="<?php echo $item['stok'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Harga</label>
                                        <div class="col-md-9">
                                            <input type="number" name="harga" class="form-control" placeholder="Harga" value="<?php echo $item['harga'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Deskripsi Buku</label>
                                        <div class="col-md-9">
                                            <textarea name="deskripsi" cols="30" rows="10" class="form-control" placeholder="Deskripsi Buku" required><?php echo $item['deskripsi'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-5">
                                        <div class="col-md-6">
                                            <!-- back to home -->
                                            <a name="backBtn" id="backBtn" class="btn btn-white btn-block btn-lg mb-2" href="buku.php" role="button">Kembali</a>
                                        </div>

                                        <div class="col-md-6">
                                            <!-- input button to submit form. Please check href attribute -->
                                            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Update" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </form>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Garis Studio 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Untuk Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan "Logout" untuk keluar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery2.min.js"></script>
</body>

</html>