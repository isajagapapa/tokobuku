<?php
include 'config.php';

/**
 * mengirimkan data yang telah diinputkan di id_penerbit
 */
$id_penerbit        = $_POST['id_penerbit'];
/**
 * mengirimkan data yang telah diinputkan di nama_pernebit
 */
$nama_penerbit      = $_POST['nama_penerbit'];
/**
 * mengirimkan data yang telah diinputkan di id_kategori
 */
$alamat_penerbit      = $_POST['alamat_penerbit'];
/**
 * mengirimkan data yang telah diinputkan di id_kategori
 */
$email_penerbit      = $_POST['email_penerbit'];
/**
 * mengirimkan data yang telah diinputkan di id_kategori
 */
$telp_penerbit      = $_POST['telp_penerbit'];

/**
 * query untuk mengedit data
 */
$query = "UPDATE penerbit SET nama_penerbit = '$nama_penerbit', alamat_penerbit = '$alamat_penerbit', email_penerbit='$email_penerbit', telp_penerbit='$telp_penerbit' WHERE id_penerbit = '$id_penerbit'";

mysqli_query($koneksi, $query);

header("Location:penerbit.php");
?>