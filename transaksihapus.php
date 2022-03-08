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
 * mengambil nilai dari jumlah
 */
$jumlah = $_GET['jumlah'];

//eksekusi query
mysqli_query($koneksi, "DELETE FROM transaksi WHERE id='$id'");

//pindah page
header("location:transaksi.php?randomcode=$id_transaksi");
