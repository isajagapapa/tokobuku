<?php
include 'config.php';

/**
 * mengirimkan data yang telah diinputkan di code
 */
$code = $_POST['code'];

/**
 * mengirimkan data yang telah diinputkan di id_transaksi
 */
$id_transaksi = $_POST["id_transaksi"];
/**
 * mengirimkan data yang telah diinputkan di id_buku
 */
$id_buku = $_POST["id_buku"];

/**
 * eksekusi query
 */
$buku = mysqli_query($koneksi, "select * from buku where id_buku = '$id_buku'");

/**
 * mengambil baris hasil sebagai array
 */
$data_buku = mysqli_fetch_assoc($buku);
/**
 * mengambil nilai nilai harga dari $data_buku
 */
$harga_jual = $data_buku['harga'];

/**
 * menentukan nilai dari variabel jumlah
 */
$jumlah = 1;
/**
 * operasi perkalian antara jumlah dan nilai dari $harga_jual
 */
$total = $jumlah * $harga_jual;

/**
 * eksekusi query untuk meliha data
 */
$buku2 = mysqli_query($koneksi, "select * from buku where id_buku = '$id_buku'");

//mengambil baris hasil sebagai array
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
