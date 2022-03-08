<?php
include 'config.php';
/**
 * mengirimkan data yang telah diinputkan di code2
 */
$code = $_POST['code2'];

/**
 * mengirimkan data yang telah diinputkan di transaksi2
 */
$id_transaksi = $_POST["id_transaksi2"];
/**
 * mengirimkan data yang telah diinputkan dengan forma tanggal
 */
$tgl_transaksi = date("Y-m-d");
/**
 * mengirimkan data yang telah diinputkan di sub_total
 */
$sub_total = $_POST["sub_total"];
/**
 * mengirimkan data yang telah diinputkan di diskon
 */
$diskon = $_POST["diskon"];
/**
 * mengirimkan data yang telah diinputkan di potongan
 */
$potongan = $_POST["potongan"];
/**
 * mengirimkan data yang telah diinputkan di total_bayar
 */
$total_bayar = $_POST["total_bayar"];
/**
 * mengirimkan data yang telah diinputkan di bayar
 */
$bayar = $_POST["bayar"];
/**
 * mengirimkan data yang telah diinputkan di kembali
 */
$kembali = $_POST["kembali"];

/**
 * query untuk meenginput data
 */
$query = "INSERT INTO transaksidetail VALUES ('$id_transaksi','$tgl_transaksi','$sub_total','$diskon','$potongan','$total_bayar','$bayar','$kembali',0)";

/**
 * mengeksekusi query untuk meenginput data
 */
mysqli_query($koneksi, $query);

header("location:transaksi.php?randomcode=$code");
