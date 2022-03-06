<?php
include 'config.php';
$rc = $_GET['randomcode'];

$query2 = "SELECT * FROM transaksidetail WHERE id_transaksi = '$rc'";

$head = mysqli_query($koneksi, $query2);

if ($head->num_rows > 0) {
    while ($data1 = mysqli_fetch_array($head)) {
        $id_t = $data1['id_transaksi'];
        $tanggal = $data1['tgl_transaksi'];
    }
} else {
    $id_t = "";
    $tanggal = "";
}

$data = mysqli_fetch_assoc($head);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Nota <?php echo $id_t ?></title>
</head>

<body onload="window.print();">
    <div class="container mt-5">
        <div class="container-fluid">
            <p class="text-center">-----------------------------------------------</p>
            <p class="fw-bold text-center">GARIS BOOK STORE</p>
            <p class="text-center">-----------------------------------------------</p>
            <p class="text-center">Tanggal | <?php echo $tanggal ?></p>
            <p class="text-center">ID Transaksi | <?php echo $id_t ?></p>
            <p class="text-center">-----------------------------------------------</p>
        </div>

        <div class="container-fluid col-10">
            <table id="tabelBuku" class="table col-10">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Buku</th>
                        <th scope="col">Nama Buku</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include 'config.php';
                    $no = 1;

                    $query = "SELECT t.id_buku, b.judul_buku, b.harga, t.jumlah, t.total FROM transaksi t, buku b where t.id_buku = b.id_buku 
                                    AND t.id_transaksi = '$rc'";

                    $result = mysqli_query($koneksi, $query);

                    if ($result->num_rows > 0) {
                        while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td><?php echo $no++ ?></td>

                                <td><?php echo $data['id_buku']; ?></td>
                                <td><?php echo $data['judul_buku']; ?></td>
                                <td><?php echo $data['harga']; ?></td>

                                <td><?php echo $data['jumlah']; ?></td>
                                <td><?php echo $data['total']; ?></td>
                            </tr>

                    <?php
                            global $total_bayar;
                            $total_bayar = $total_bayar + $data['total'];
                        }
                    } else {
                        $total_bayar = null;
                    }

                    $query1 = "SELECT * FROM transaksidetail where deleted = 0 AND id_transaksi = '$rc'";
                    $result1 = mysqli_query($koneksi, $query1);

                    if ($result1->num_rows > 0) {
                        while ($data1 = mysqli_fetch_array($result1)) {
                            $diskonn = $data1['diskon'];
                            $potongan = $data1['potongan'];
                            $total_bayar1 = $data1['total_bayar'];
                            $bayar = $data1['bayar'];
                            $kembali = $data1['kembali'];
                        }
                    } else {
                        $diskonn = null;
                        $potongan = null;
                        $total_bayar1 = null;
                        $bayar = null;
                        $kembali = null;
                    }
                    ?>

                    <tr>
                        <th colspan="5" style="text-align: right;">Sub Total: </th>
                        <td><input style="border: none;" value="<?php echo $total_bayar ?>"></td>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: right;">Diskon(%): </th>
                        <td><input style="border: none;" value="<?php echo $diskonn ?>"></td>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: right;">Potongan Diskon: </th>
                        <td><input style="border: none;" value="<?php echo $potongan ?>" readonly></td>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: right;">Total Bayar: </th>
                        <td><input style="border: none;" value="<?php echo $total_bayar1 ?>" readonly></td>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: right;">Bayar: </th>
                        <td><input style="border: none;" value="<?php echo $bayar ?>"></td>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: right;">Kembali: </th>
                        <td><input style="border: none;" value="<?php echo $kembali ?>" readonly></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>