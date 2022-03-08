<?php
include 'config.php';

/**
 * mengambil nilai dari randomcode
 */
$code = $_GET['randomcode'];

/**
 * mengirimkan data yang telah diinputkan di id_transaksi2
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
 * menjalankan query untuk mengupdate penambahan data total
 */
mysqli_query($koneksi, "UPDATE transaksi SET total=(total+$harga) where id='$id'");

/**
 * query untuk mengupdate data
 */
$query = "UPDATE transaksidetail SET id_transaksi = '$id_transaksi',tgl_transaksi = '$tgl_transaksi',sub_total = '$sub_total',diskon = '$diskon',potongan = '$potongan',total_bayar = '$total_bayar',bayar = '$bayar',kembali = '$kembali', deleted = 0";

mysqli_query($koneksi, $query);

header("location:transaksidtedit.php?randomcode=$code");
