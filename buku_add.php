<?php
include 'config.php';

$id_buku        = $_POST['id_buku'];
$judul_buku     = $_POST['judul_buku'];
$id_pengarang   = $_POST['id_pengarang'];
$id_penerbit    = $_POST['id_penerbit'];
$id_kategori    = $_POST['id_kategori'];
$stok           = $_POST['stok'];
$harga          = $_POST['harga'];
$deskripsi      = $_POST['deskripsi'];

$nama_folder    = "images";
$nama_file      = $_FILES["gambar"]["name"];
$tmp            = $_FILES["gambar"]["tmp_name"];
$path           = "$nama_folder/$nama_file";
$tipe_file      = array("image/jpeg", "image/png", "image/jpg");

$query = "INSERT INTO buku VALUES ('$id_buku','$judul_buku','$id_pengarang','$id_penerbit','$id_kategori',$stok,$harga,'$deskripsi','$nama_file',0)";

if (!in_array($_FILES["gambar"]["type"], $tipe_file) && $nama_file != "") {
    $error = urldecode("Cek kembali ekstensi file anda (*.jpg,*.gif,*.png)");
    header("Location:bukutambah.php?error=$error");
} else if (in_array($_FILES["gambar"]["type"], $tipe_file) && $nama_file != "") {
    if (mysqli_query($koneksi, $query)) {
        move_uploaded_file($tmp, $path);
        header("Location:buku.php");
    } else {
        $error = urldecode("Data tidak berhasil ditambahkan");
        header("Location:bukutambah.php?error=$error");
    }
    mysqli_close($koneksi);
}

?>
