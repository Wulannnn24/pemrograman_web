<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form User</title>
</head>
<body>
    <h1><?= isset($user) ? 'Edit' : 'Tambah' ?> User</h1>
    <form method="POST" action="index.php?action=<?= isset($user) ? 'user_update&id=' . $user['id'] : 'user_store' ?>">

        <label>Nama:</label>
        <input type="text" name="name" value="<?= isset($user) ? $user['name'] : '' ?>" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?= isset($user) ? $user['email'] : '' ?>" required><br><br>
        

        <button type="submit">Simpan</button>
    </form>
    <a href="index.php?action=user_index">Kembali</a>

</body>
</html>