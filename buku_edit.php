<?php
    include 'config.php';

/**
 * mengirimkan data yang telah diinputkan di id_buku
 */
    $id_buku        = $_POST['id_buku'];
/**
 * mengirimkan data yang telah diinputkandi di judul_buku
 */
    $judul_buku     = $_POST['judul_buku'];
/**
 * mengirimkan data yang telah diinputkan di id_pengarang
 */
    $id_pengarang   = $_POST['id_pengarang'];
/**
 * mengirimkan data yang telah diinputkan di id_penerbit
 */
    $id_penerbit    = $_POST['id_penerbit'];
/**
 * mengirimkan data yang telah diinputkan di id_kategori
 */
    $id_kategori    = $_POST['id_kategori'];
/**
 * mengirimkan data yang telah diinputkan di stok
 */
    $stok           = $_POST['stok'];
/**
 * mengirimkan data yang telah diinputkan di harga
 */
    $harga          = $_POST['harga'];
/**
 * mengirimkan data yang telah diinputkan di deskripsi
 */
    $deskripsi      = $_POST['deskripsi'];

/**
 * untuk menentukan tempat folder
 */
    $nama_folder    = "images";
/**
 * mengetahui nama file dan jenis-jenis file yang akan kita upload
 */
    $nama_file      = $_FILES["gambar"]["name"];
/**
 * nama sementara yang disimpan pada file yang akan di upload
 */
    $tmp            = $_FILES["gambar"]["tmp_name"];
/**
 * menentukan path untuk menyimpan upload file
 */
    $path           = "$nama_folder/$nama_file";
/**
 * tipe file yang digunakan untuk upload
 */
    $tipe_file      = array("image/jpeg","image/png","image/jpg");

/**
 * query untuk mengedit data
 */
    $query = "UPDATE buku SET judul_buku = '$judul_buku', id_pengarang = '$id_pengarang', id_penerbit = '$id_penerbit', id_kategori = '$id_kategori', stok = $stok, harga = $harga, deskripsi = '$deskripsi' WHERE id_buku = '$id_buku'";

    // syarat upload foto
    if(!in_array($_FILES["gambar"]["type"],$tipe_file) && $nama_file != "")
    {
        $error = urldecode("Cek kembali ekstensi file anda (*.jpg,*.gif,*.png)");
        header("Location:bukuedit.php?error=$error");
    }
    else if(in_array($_FILES["gambar"]["type"],$tipe_file) && $nama_file != "")
    {
        // jika gambar diubah
        $query_gambar = "SELECT gambar FROM buku WHERE id_buku='$id_buku'";
        $result       = mysqli_query($koneksi, $query_gambar);
        $hasil        = mysqli_fetch_assoc($result);
        $gambar       = $hasil['gambar'];

        // menghapus gambar lama
        unlink('images/'. $gambar);
        
        // upload gambar baru
        move_uploaded_file($tmp,$path);
        
        // query untuk mengupdate data + gambar
	    $query = "UPDATE buku SET judul_buku = '$judul_buku', id_pengarang = '$id_pengarang', id_penerbit = '$id_penerbit', id_kategori = '$id_kategori', stok = $stok, harga = $harga, deskripsi = '$deskripsi', gambar='$nama_file' WHERE id_buku = '$id_buku'";

        // menjalankan query isi data
        if (mysqli_query($koneksi, $query))
        {
            header("Location:buku.php");
        }
        else
        {
            $error = urldecode("Data tidak berhasil diupdate");
            header("Location:bukuedit.php?error=$error");
        }
    }
    else if($nama_file == "")
    {
	// query untuk mengupdate data
        $query = "UPDATE buku SET judul_buku = '$judul_buku', id_pengarang = '$id_pengarang', id_penerbit = '$id_penerbit', id_kategori = '$id_kategori', stok = $stok, harga = $harga, deskripsi = '$deskripsi' WHERE id_buku = '$id_buku'";

        // menjalankan query update data
        if (mysqli_query($koneksi, $query))
        {
            header("Location:buku.php");
        }
        else
        {
            $error = urldecode("Update gagal dijalankan");
            header("Location:bukuedit.php?error=$error");
        }
    }

    mysqli_close($koneksi);
?>
