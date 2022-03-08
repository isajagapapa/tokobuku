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
 * query untuk mengedit data
 */
$query = "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'";

mysqli_query($koneksi, $query);

header("Location:kategori.php")
?>