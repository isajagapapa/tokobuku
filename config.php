<?php

/**
 *  koneksi variabel untuk mengoneksikan ke database
 */

$koneksi = mysqli_connect("localhost", "root", "", "ucptokobuku");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal" . mysqli_connect_error();
}
?>