<?php

include 'config.php';

/**
 * mengambil nilai dari id_buku
 */
$id_buku = $_GET['id_buku'];

/**
 * query untuk menghapus data
 */
mysqli_query($koneksi, "UPDATE buku SET deleted = 1 WHERE id_buku = '$id_buku'");

header("location:buku.php");
?>

