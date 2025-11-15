<?php
include 'config.php';

$nama = $_POST['nama'];
$idp = $_POST['id_produk'];
$jumlah = $_POST['jumlah'];

$produk = mysqli_query($conn, "SELECT * FROM produk WHERE id=$idp");
$p = mysqli_fetch_assoc($produk);

$total = $p['harga'] * $jumlah;

mysqli_query($conn, "INSERT INTO transaksi (nama_pembeli, id_produk, jumlah, total)
VALUES ('$nama', '$idp', '$jumlah', '$total')");

mysqli_query($conn, "UPDATE produk SET stok = stok - $jumlah WHERE id=$idp");
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="process.css">
    <title>Transaksi Berhasil</title>
</head>

<body>

    <div class="container">
        <div class="success-icon">✔</div>

        <h2>Transaksi Berhasil!</h2>

        <p>Terima kasih <b><?= $nama ?></b>.<br>
            Pembelian <b><?= $jumlah ?></b> x <b><?= $p['nama'] ?></b> berhasil diproses.</p>

        <p><b>Total: Rp <?= number_format($total, 0, ',', '.') ?></b></p>

        <a href="index.php">Kembali ke Produk</a>
    </div>

</body>

</html>