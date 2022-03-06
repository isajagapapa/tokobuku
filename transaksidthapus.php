<?php
include 'config.php';

$id_transaksi = $_GET['randomcode'];
mysqli_query($koneksi, "DELETE FROM transaksidetail WHERE id_transaksi = '$id_transaksi'");
mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'");

header("location:transaksilaporan.php");
