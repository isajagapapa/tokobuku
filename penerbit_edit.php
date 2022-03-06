<?php
include 'config.php';

$id_penerbit        = $_POST['id_penerbit'];
$nama_penerbit      = $_POST['nama_penerbit'];
$alamat_penerbit      = $_POST['alamat_penerbit'];
$email_penerbit      = $_POST['email_penerbit'];
$telp_penerbit      = $_POST['telp_penerbit'];

$query = "UPDATE penerbit SET nama_penerbit = '$nama_penerbit', alamat_penerbit = '$alamat_penerbit', email_penerbit='$email_penerbit', telp_penerbit='$telp_penerbit' WHERE id_penerbit = '$id_penerbit'";

mysqli_query($koneksi, $query);

header("Location:penerbit.php");
?>