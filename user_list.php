<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar User</title>
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
    <h1>Daftar User</h1>
    <a href="index.php?action=home">Beranda</a> 
    <a href="index.php?action=user_create">Tambah User</a>

    <div class="center">
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>

            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td>
                            <a href="index.php?action=user_edit&id=<?= $user['id'] ?>">Edit</a> |
                            <a href="index.php?action=user_delete&id=<?= $user['id'] ?>" onclick="return confirm('Hapus user ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4">Tidak ada data user.</td></tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
