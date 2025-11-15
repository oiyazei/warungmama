<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Toko Kelontong</title>
</head>

<body>
    <h2>Daftar Produk</h2>

    <table border="1" cellpadding="10">
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM produk");
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['harga'] ?></td>
                <td><?= $row['stok'] ?></td>
                <td><a href="beli.php?id=<?= $row['id'] ?>">Beli</a></td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>