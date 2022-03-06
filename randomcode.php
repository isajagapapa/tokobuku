<?php
include 'config.php';

$tampilkan_isi = "select count(id_transaksi) as jumlah from transaksi;";
$tampilkan_isi_sql = mysqli_query($koneksi, $tampilkan_isi);
$no = 1;

while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
    $jumlah = $isi['jumlah'];
}

$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomcode = $no + $jumlah . substr(str_shuffle($permitted_chars), 0, 10);
