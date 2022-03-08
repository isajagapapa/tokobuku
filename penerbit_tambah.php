<?php

include 'config.php';

/**
 * mengirimkan data yang telah diinputkan di id_penerbit
 */
$id_penerbit        = $_POST['id_penerbit'];
/**
 * mengirimkan data yang telah diinputkan di nama penerbit
 */
$nama_penerbit      = $_POST['nama_penerbit'];
/**
 * mengirimkan data yang telah diinputkan di alamat_penerbit
 */
$alamat_penerbit      = $_POST['alamat_penerbit'];
/**
 * mengirimkan data yang telah diinputkan di email_penerbit
 */
$email_penerbit      = $_POST['email_penerbit'];
/**
 * mengirimkan data yang telah diinputkan di telp_penerbit
 */
$telp_penerbit      = $_POST['telp_penerbit'];

/**
 * query untuk menambahkan data
 */
$query = "INSERT INTO penerbit VALUES ('$id_penerbit','$nama_penerbit','$alamat_penerbit','$email_penerbit','$telp_penerbit',0)";

mysqli_query($koneksi, $query);

header("location:penerbit.php");

?>