<?php

include 'config.php';

$id_buku = $_GET['id_buku'];

mysqli_query($koneksi, "UPDATE buku SET deleted = 1 WHERE id_buku = '$id_buku'");

header("location:buku.php");
?>

