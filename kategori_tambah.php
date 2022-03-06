<?php
include 'config.php';

$id_kategori     = $_POST['id_kategori'];
$nama_kategori    = $_POST['nama_kategori'];

$query = "INSERT INTO kategori (id_kategori, nama_kategori, deleted) VALUES ('$id_kategori','$nama_kategori',0)";

mysqli_query($koneksi, $query);

header("location:kategori.php");
?>