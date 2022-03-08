<?php
include 'config.php';

/**
 * mengirimkan data yang telah diinputkan di id_pengarang
 */
$id_pengarang        = $_POST['id_pengarang'];
/**
 * mengirimkan data yang telah diinputkan di nama_pengarang
 */
$nama_pengarang      = $_POST['nama_pengarang'];
/**
 * mengirimkan data yang telah diinputkan di alamat_pengarang
 */
$alamat_pengarang      = $_POST['alamat_pengarang'];
/**
 * mengirimkan data yang telah diinputkan di email_pengarang
 */
$email_pengarang      = $_POST['email_pengarang'];

/**
 * query untuk mengedit data
 */
$query = "UPDATE pengarang SET nama_pengarang = '$nama_pengarang', alamat_pengarang = '$alamat_pengarang', email_pengarang='$email_pengarang' WHERE id_pengarang = '$id_pengarang'";

mysqli_query($koneksi, $query);

header("Location:pengarang.php");

?>
