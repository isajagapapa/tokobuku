<?php
include 'config.php';

$code = $_GET['randomcode'];

$id_transaksi = $_POST["id_transaksi2"];
$tgl_transaksi = date("Y-m-d");
$sub_total = $_POST["sub_total"];
$diskon = $_POST["diskon"];
$potongan = $_POST["potongan"];
$total_bayar = $_POST["total_bayar"];
$bayar = $_POST["bayar"];
$kembali = $_POST["kembali"];

mysqli_query($koneksi, "UPDATE transaksi SET total=(total+$harga) where id='$id'");

$query = "UPDATE transaksidetail SET id_transaksi = '$id_transaksi',tgl_transaksi = '$tgl_transaksi',sub_total = '$sub_total',diskon = '$diskon',potongan = '$potongan',total_bayar = '$total_bayar',bayar = '$bayar',kembali = '$kembali', deleted = 0";

mysqli_query($koneksi, $query);

header("location:transaksidtedit.php?randomcode=$code");
