<?php
include 'config.php';

$code = $_POST['code'];

$id_transaksi = $_POST["id_transaksi"];
$id_buku = $_POST["id_buku"];

$buku = mysqli_query($koneksi, "select * from buku where id_buku = '$id_buku'");

$data_buku = mysqli_fetch_assoc($buku);
$harga_jual = $data_buku['harga'];

$jumlah = 1;
$total = $jumlah * $harga_jual;

$buku2 = mysqli_query($koneksi, "select * from buku where id_buku = '$id_buku'");

while ($data_buku2 = mysqli_fetch_assoc($buku2)) {
    $sisa = $data_buku2['stok'];
    if ($sisa == 0) {
        $error = urldecode("Stok Barang Habis");
        header("location:transaksi.php?randomcode=$code");
    } else {
        $koneksi->query("insert into transaksi (id_transaksi,id_buku,jumlah,total) values ('$id_transaksi','$id_buku','$jumlah','$total')");

        header("location:transaksi.php?randomcode=$code");
    }
}
