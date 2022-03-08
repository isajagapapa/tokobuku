<?php

include 'config.php';

/**
 * mengambil nilai dari id_buku
 */
$id_kategori = $_GET['id_kategori'];

/**
 * mengeksekusi query untuk delete
 */
mysqli_query($koneksi, "UPDATE kategori SET deleted = 1 WHERE id_kategori = '$id_kategori'");

header("location:kategori.php");
?>