<?php
include 'config.php';

$id_pengarang        = $_POST['id_pengarang'];
$nama_pengarang      = $_POST['nama_pengarang'];
$alamat_pengarang      = $_POST['alamat_pengarang'];
$email_pengarang      = $_POST['email_pengarang'];

$query = "UPDATE pengarang SET nama_pengarang = '$nama_pengarang', alamat_pengarang = '$alamat_pengarang', email_pengarang='$email_pengarang' WHERE id_pengarang = '$id_pengarang'";

mysqli_query($koneksi, $query);

header("Location:pengarang.php");

?>
