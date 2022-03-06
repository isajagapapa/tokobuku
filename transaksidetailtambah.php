<?php
include 'config.php';

$code = $_POST['code2'];

$id_transaksi = $_POST["id_transaksi2"];
$tgl_transaksi = date("Y-m-d");
$sub_total = $_POST["sub_total"];
$diskon = $_POST["diskon"];
$potongan = $_POST["potongan"];
$total_bayar = $_POST["total_bayar"];
$bayar = $_POST["bayar"];
$kembali = $_POST["kembali"];

$query = "INSERT INTO transaksidetail VALUES ('$id_transaksi','$tgl_transaksi','$sub_total','$diskon','$potongan','$total_bayar','$bayar','$kembali',0)";

mysqli_query($koneksi, $query);

header("location:transaksi.php?randomcode=$code");
