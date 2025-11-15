<?php
include 'config.php';
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id");
$produk = mysqli_fetch_assoc($result);
$harga = $produk['harga'];
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="beli.css">
    <title>Beli Produk</title>
</head>

<body>

    <div class="container">
        <h2>Form Pembelian</h2>

        <form action="process.php" method="POST">
            <input type="hidden" name="id_produk" value="<?= $produk['id'] ?>">
            <input type="hidden" name="harga" id="harga" value="<?= $harga ?>">

            <!-- Nama Pembeli -->
            <label>Nama Pembeli:</label>
            <input type="text" name="nama" required>

            <!-- Nama Produk -->
            <label>Produk Dibeli:</label>
            <input type="text" value="<?= $produk['nama'] ?>" readonly>

            <!-- Harga -->
            <label>Harga Satuan:</label>
            <input type="text" value="Rp <?= number_format($harga, 0, ',', '.') ?>" readonly>

            <!-- Jumlah beli -->
            <label>Jumlah Beli:</label>
            <input type="number" id="jumlah" name="jumlah" min="1" required oninput="hitungTotal()">

            <!-- Total harga -->
            <label>Total Harga:</label>
            <input type="text" id="total" readonly>

            <button type="submit">Beli Sekarang</button>
        </form>
    </div>

    <script>
        function hitungTotal() {
            let harga = document.getElementById('harga').value;
            let jumlah = document.getElementById('jumlah').value;
            let total = harga * jumlah;

            document.getElementById('total').value = "Rp " + total.toLocaleString('id-ID');
        }
    </script>

</body>

</html>