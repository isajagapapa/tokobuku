<?php
include 'config.php';

$id_transaksi = $_GET['randomcode'];
$id = $_GET['id'];
$harga = $_GET['harga'];
$id_buku = $_GET['id_buku'];

$query = "UPDATE transaksi SET jumlah=(jumlah-1) where id='$id'";
mysqli_query($koneksi, $query);

mysqli_query($koneksi, "UPDATE transaksi SET total=(total-$harga) where id='$id'");

mysqli_query($koneksi, "UPDATE buku SET stok=(stok+1) WHERE id_buku='$id_buku'");

header("location:transaksidtedit.php?randomcode=$id_transaksi");
