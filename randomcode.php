<?php
include 'config.php';

/**
 * query untuk menjumlahkan data dari tabel di database
 */
$tampilkan_isi = "select count(id_transaksi) as jumlah from transaksi;";
/**
 * menajalankan query
 */
$tampilkan_isi_sql = mysqli_query($koneksi, $tampilkan_isi);
/**
 * menentukan nilai awal dari variabel no
 */
$no = 1;

while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
    $jumlah = $isi['jumlah'];
}

/**
 * variabel untuk menentukan karakter
 */
$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
/**
 * mengacak karakter
 */
$randomcode = $no + $jumlah . substr(str_shuffle($permitted_chars), 0, 10);
