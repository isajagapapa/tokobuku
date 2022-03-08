<?php
include 'config.php';

/**
 * mengambil nilai dari randomcode
 */
$id_transaksi = $_GET['randomcode'];
/**
 * mengambil nilai dari id
 */
$id = $_GET['id'];
/**
 * mengambil nilai dari harga
 */
$harga = $_GET['harga'];
/**
 * mengambil nilai dari id_buku
 */
$id_buku = $_GET['id_buku'];

/**
 * query untuk mengubah jumlah bertambah
 */
$query = "UPDATE transaksi SET jumlah=(jumlah+1) where id='$id'";
/**
 * mengeksekusi query
 */
mysqli_query($koneksi, $query);

/**
 * query untuk mengubah total harga dak mengeksekusinya
 */
mysqli_query($koneksi, "UPDATE transaksi SET total=(total+$harga) where id='$id'");
/**
 * query untuk mengubah stok berkurang
 */
mysqli_query($koneksi, "UPDATE buku SET stok=(stok-1) WHERE id_buku='$id_buku'");

header("location:transaksi.php?randomcode=$id_transaksi");
