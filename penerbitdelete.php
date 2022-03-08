<?php

include 'config.php';

/**
 * mengambil nilai dari id_buku
 */
$id_penerbit = $_GET['id_penerbit'];

/**
 * mengeksekusi query untuk delete
 */
mysqli_query($koneksi, "UPDATE penerbit SET deleted = 1 WHERE id_penerbit = '$id_penerbit'");

header("location:penerbit.php");
?>