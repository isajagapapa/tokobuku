<?php
include 'config.php';

$id_transaksi = $_GET['randomcode'];
$id = $_GET['id'];
$harga = $_GET['harga'];
$id_buku = $_GET['id_buku'];
$jumlah = $_GET['jumlah'];

mysqli_query($koneksi, "DELETE FROM transaksi WHERE id='$id'");

header("location:transaksi.php?randomcode=$id_transaksi");
