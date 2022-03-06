<?php

include 'config.php';

$id_pengarang = $_GET['id_pengarang'];

mysqli_query($koneksi, "UPDATE pengarang SET deleted = 1 WHERE id_pengarang = '$id_pengarang'");

header("location:pengarang.php");
