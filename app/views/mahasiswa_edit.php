<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h1>Edit Mahasiswa</h1>
    <form action="index.php?action=update" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($mahasiswa['id']); ?>">
        Nama: <input type="text" name="nama" value="<?php echo htmlspecialchars($mahasiswa['nama']); ?>" required><br>
        NIM: <input type="text" name="nim" value="<?php echo htmlspecialchars($mahasiswa['nim']); ?>" required><br>
        Jurusan: <input type="text" name="jurusan" value="<?php echo htmlspecialchars($mahasiswa['jurusan']); ?>" required><br>
        <button type="submit">Update</button>
    </form>
    <a href="index.php?action=index">Kembali</a>
</body>
</html>