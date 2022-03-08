<?php

include 'config.php';

/**
 * mengambil nilai dari id_pengarang
 */
$id_pengarang = $_GET['id_pengarang'];

/**
 * mengeksekusi query untuk delete
 */
mysqli_query($koneksi, "UPDATE pengarang SET deleted = 1 WHERE id_pengarang = '$id_pengarang'");

header("location:pengarang.php");
