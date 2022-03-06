<?php

include 'config.php';

$id_penerbit        = $_POST['id_penerbit'];
$nama_penerbit      = $_POST['nama_penerbit'];
$alamat_penerbit      = $_POST['alamat_penerbit'];
$email_penerbit      = $_POST['email_penerbit'];
$telp_penerbit      = $_POST['telp_penerbit'];

$query = "INSERT INTO penerbit VALUES ('$id_penerbit','$nama_penerbit','$alamat_penerbit','$email_penerbit','$telp_penerbit',0)";

mysqli_query($koneksi, $query);

header("location:penerbit.php");

?>