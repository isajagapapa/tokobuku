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
 * query untuk mengupdate jumlah yang berkurang
 */
$query = "UPDATE transaksi SET jumlah=(jumlah-1) where id='$id'";
//eksekusi query
mysqli_query($koneksi, $query);

//eksekusi query
mysqli_query($koneksi, "UPDATE transaksi SET total=(total-$harga) where id='$id'");

//eksekusi query
mysqli_query($koneksi, "UPDATE buku SET stok=(stok+1) WHERE id_buku='$id_buku'");

//pindah page
header("location:transaksidtedit.php?randomcode=$id_transaksi");
