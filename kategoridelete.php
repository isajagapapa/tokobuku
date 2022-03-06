<?php

include 'config.php';

$id_kategori = $_GET['id_kategori'];

mysqli_query($koneksi, "UPDATE kategori SET deleted = 1 WHERE id_kategori = '$id_kategori'");

header("location:kategori.php");
?>