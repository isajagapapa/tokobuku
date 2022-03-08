<?php
include 'config.php';

/**
 * mengambil nilai dari randomcode
 */
$id_transaksi = $_GET['randomcode'];
//eksekusi query delete detail transaksi
mysqli_query($koneksi, "DELETE FROM transaksidetail WHERE id_transaksi = '$id_transaksi'");
//eksekusi query delete transaksi
mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'");

header("location:transaksilaporan.php");
