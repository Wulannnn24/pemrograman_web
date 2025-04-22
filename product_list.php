<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
<style>
    body {
        text-align: center;
    }
    .center {
        margin: 0 auto;
        width: 80%;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        padding: 8px;
        border: 1px solid #333;
    }
</style>
</head>
<body>
    <h1>Daftar Produk</h1>
    <a href="index.php?action=home">Beranda</a> 
    <a href="index.php?action=create">Tambah Produk</a>
    <br><br>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php if (!empty($product)): ?>
            <?php foreach ($product as $p): ?>
                <tr>
                    <td><?= $p['id'] ?></td>
                    <td><?= $p['name'] ?></td>
                    <td><?= $p['price'] ?></td>
                    <td>
                        <a href="index.php?action=edit&id=<?= $p['id'] ?>">Edit</a> |
                        <a href="index.php?action=delete&id=<?= $p['id'] ?>" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">Tidak ada produk.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
