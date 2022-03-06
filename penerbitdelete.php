<?php

include 'config.php';

$id_penerbit = $_GET['id_penerbit'];

mysqli_query($koneksi, "UPDATE penerbit SET deleted = 1 WHERE id_penerbit = '$id_penerbit'");

header("location:penerbit.php");
?>