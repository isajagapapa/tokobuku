<?php

include 'config.php';

$id_pengarang        = $_POST['id_pengarang'];
$nama_pengarang    = $_POST['nama_pengarang'];
$alamat_pengarang      = $_POST['alamat_pengarang'];
$email_pengarang      = $_POST['email_pengarang'];

$query = "INSERT INTO pengarang VALUES ('$id_pengarang','$nama_pengarang','$alamat_pengarang','$email_pengarang',0)";

mysqli_query($koneksi, $query);

header("location:pengarang.php");
