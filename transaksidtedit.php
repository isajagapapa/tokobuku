<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:index.php");
    exit;
}
?>

<?php
include 'config.php';
?>

<?php
include 'randomcode.php';
$randomcode1 = $_GET['randomcode'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="img/is1.png" rel="icon">
    <title>Detail Transaksi</title>
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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-info-circle"></i>
                    <span>Informasi</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data</h6>
                        <hr class="sidebar-divider my-0  bg-gradient-primary">
                        <a class="collapse-item" href="buku.php">Buku</a>
                        <a class="collapse-item" href="kategori.php">Kategori</a>
                        <a class="collapse-item" href="penerbit.php">Penerbit</a>
                        <a class="collapse-item" href="pengarang.php">Pengarang</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tr" aria-expanded="true" aria-controls="tr">
                    <i class="fas fa-money-check"></i>
                    <span>Transaksi</span>
                </a>
                <div id="tr" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data</h6>
                        <hr class="sidebar-divider my-0  bg-gradient-primary">
                        <a class="collapse-item" href="transaksi.php?randomcode=<?php echo $randomcode ?>">Nota</a>
                        <a class="collapse-item active" href="transaksilaporan.php">Daftar Transaksi</a>
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
                <h1 class="h3 mb-2 text-gray-800">Detail Transaksi</h1>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Transaksi</a></li>
                            <li class="breadcrumb-item"><a href="transaksilaporan.php" class="breadcrumb-link">Daftar Transaksi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
                        </ol>
                    </nav>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
                    </div>
                    <div class="card-body">
                        <form action="transaksidt_tambah.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <?php
                                $tgl = mysqli_query($koneksi, "SELECT tgl_transaksi FROM transaksidetail WHERE id_transaksi = '$randomcode1'");
                                $ini = mysqli_fetch_assoc($tgl);
                                ?>
                                <label class="col-md-2 col-form-label">Tanggal</label>
                                <div class="col-md-8">
                                    <input type="text" name="tgl" class="form-control" value="<?php echo $ini['tgl_transaksi'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">ID Transaksi</label>
                                <div class="col-md-8">
                                    <input type="text" name="id_transaksi" class="form-control" value="<?php echo $randomcode1 ?>" readonly>
                                    <input type="text" name="code" value="<?php echo $randomcode1 ?>" hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label mt-1">Judul Buku</label>
                                <div class="col-md-8">
                                    <select required name="id_buku" class="form-control">
                                        <option value="" disabled selected>--</option>
                                        <?php
                                        $tampilkan_isi = "select * from buku where deleted = 0";
                                        $tampilkan_isi_sql = mysqli_query($koneksi, $tampilkan_isi);
                                        $no = 1;

                                        while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                                            echo "<option value='" . $isi['id_buku'] . "'>" . $isi['judul_buku'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" name="tambah" class="btn btn-primary btn-block mt-1" value="Tambah" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tabel Nota -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="transaksidt_edit.php?randomcode=<?php echo $randomcode1 ?>" method="POST" enctype="multipart/form-data">
                            <input type="text" name="code2" value="<?php echo $randomcode1 ?>" hidden>
                            <input type="text" name="id_transaksi2" value="<?php echo $randomcode1 ?>" hidden>
                            <div class="table-responsive">
                                <table id="tabelBuku" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">ID Buku</th>
                                            <th scope="col">Judul Buku</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        include 'config.php';
                                        $no = 1;

                                        $query = "SELECT t.id, t.id_buku, b.judul_buku, b.harga, t.jumlah, t.total FROM transaksi t, buku b where t.id_buku = b.id_buku 
                                    AND t.id_transaksi = '$randomcode1'";

                                        $result = mysqli_query($koneksi, $query);

                                        if ($result->num_rows > 0) {
                                            while ($data = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>

                                                    <td><?php echo $data['id_buku']; ?></td>
                                                    <td><?php echo $data['judul_buku']; ?></td>
                                                    <td><?php echo $data['harga']; ?></td>

                                                    <td><?php echo $data['jumlah']; ?></td>
                                                    <td><?php echo $data['total']; ?></td>

                                                    <td>
                                                        <a type="button" data-toggle="tooltip" data-placement="top" title="Tambah" href="transaksidt_plus.php?randomcode=<?php echo $randomcode1 ?>&id=<?php echo $data['id'] ?>&harga=<?php echo $data['harga'] ?>&id_buku=<?php echo $data['id_buku'] ?>" class="btn btn-success btn-sm mb-2"><i class="fa fa-plus"></i></a>
                                                        <a type="button" data-toggle="tooltip" data-placement="top" title="Kurang" href="transaksidt_min.php?randomcode=<?php echo $randomcode1 ?>&id=<?php echo $data['id'] ?>&harga=<?php echo $data['harga'] ?>&id_buku=<?php echo $data['id_buku'] ?>" class=" btn btn-success btn-sm mb-2"><i class="fa fa-minus"></i></a>
                                                        <a type="button" data-toggle="tooltip" data-placement="top" title="Hapus" href="transaksidt_hapus.php?randomcode=<?php echo $randomcode1 ?>&id=<?php echo $data['id'] ?>&harga=<?php echo $data['harga'] ?>&id_buku=<?php echo $data['id_buku'] ?>&jumlah=<?php echo $data['jumlah'] ?>" class="btn btn-danger btn-sm mb-2" onclick="return confirm ('Anda Yakin Akan Menghapus?')"><i class=" fa fa-times"></i></a>
                                                    </td>
                                                </tr>

                                        <?php
                                                global $total_bayar;
                                                $total_bayar = $total_bayar + $data['total'];
                                            }
                                        } else {
                                            $total_bayar = null;
                                        }

                                        $query1 = "SELECT * FROM transaksidetail where deleted = 0 AND id_transaksi = '$randomcode1'";
                                        $result1 = mysqli_query($koneksi, $query1);

                                        if ($result1->num_rows > 0) {
                                            while ($data1 = mysqli_fetch_array($result1)) {
                                                $diskon = $data1['diskon'];
                                                $potongan = $data1['potongan'];
                                                $total_bayar1 = $data1['total_bayar'];
                                                $bayar = $data1['bayar'];
                                                $kembali = $data1['kembali'];
                                            }
                                        } else {
                                            $diskon = "";
                                            $potongan = "";
                                            $total_bayar1 = "";
                                            $bayar = "";
                                            $kembali = "";
                                        }
                                        ?>

                                        <tr>
                                            <th colspan="5" style="text-align: right;">Sub Total</th>
                                            <td><input id="sub_total" name="sub_total" onkeyup="hitung();" style="background-color: white;" type="number" class="form-control" value="<?php echo $total_bayar ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <th colspan="5" style="text-align: right;">Diskon(%)</th>
                                            <td><input type="number" name="diskon" id="diskon" onkeyup="hitung();" style="background-color: white;" class="form-control" value="<?php echo $diskon ?>"></td>
                                        </tr>
                                        <tr>
                                            <th colspan="5" style="text-align: right;">Potongan Diskon</th>
                                            <td><input onkeyup="hitung();" type="number" name="potongan" id="potongan" style=" background-color: white;" class="form-control" value="<?php echo $potongan ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <th colspan="5" style="text-align: right;">Total Bayar</th>
                                            <td><input onkeyup="hitung();" type="number" name="total_bayar" id="total_bayar" style="background-color: white;" class="form-control" value="<?php echo $total_bayar1 ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <th colspan="5" style="text-align: right;">Bayar</th>
                                            <td><input onkeyup="hitung();" type="number" name="bayar" id="bayar" style="background-color: white;" class="form-control" value="<?php echo $bayar ?>"></td>
                                        </tr>
                                        <tr>
                                            <th colspan="5" style="text-align: right;">Kembali</th>
                                            <td><input onkeyup="hitung();" type="number" name="kembali" id="kembali" style="background-color: white;" class="form-control" value="<?php echo $kembali ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <th colspan="5" style="text-align: right;"></th>
                                            <td style="text-align: right;">
                                                <a class="btn btn-danger mt-1" data-toggle="tooltip" data-placement="top" title="Cetak" onclick="window.open('transaksidt_cetak.php?randomcode=<?php echo $randomcode1 ?>','Nota','width=600,height=400')"><i class=" fa fa-print"></i> Cetak</a>
                                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Update" class="btn btn-primary mt-1" value="cetak"><i class=" fa fa-save"></i> Update</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
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
    <script>
        function hitung() {
            var sub_total = document.getElementById('sub_total').value;
            var diskon = document.getElementById('diskon').value;
            var potongan = parseInt(sub_total) * parseInt(diskon) / parseInt(100);
            if (!isNaN(potongan)) {
                document.getElementById('potongan').value = potongan;
            }

            var total_bayar = parseInt(sub_total) - parseInt(potongan);
            if (!isNaN(total_bayar)) {
                document.getElementById('total_bayar').value = total_bayar;
            }

            var bayar = document.getElementById('bayar').value;
            var kembali = parseInt(bayar) - parseInt(total_bayar);
            if (!isNaN(kembali)) {
                document.getElementById('kembali').value = kembali;
            }
        }
    </script>



    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>