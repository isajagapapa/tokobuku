<?php
include 'config.php';

/**
 * mengirimkan data yang telah diinputkan di id_kategori
 */
$id_kategori     = $_POST['id_kategori'];
/**
 * mengirimkan data yang telah diinputkan di nama_kategori
 */
$nama_kategori    = $_POST['nama_kategori'];

/**
 * query untuk menambahkan data
 */
$query = "INSERT INTO kategori (id_kategori, nama_kategori, deleted) VALUES ('$id_kategori','$nama_kategori',0)";

mysqli_query($koneksi, $query);

header("location:kategori.php");
?>