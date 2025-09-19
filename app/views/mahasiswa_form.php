<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h1>Tambah Mahasiswa Baru</h1>
    <form action="index.php?action=create" method="POST">
        Nama: <input type="text" name="nama" required><br>
        NIM: <input type="text" name="nim" required><br>
        Jurusan: <input type="text" name="jurusan" required><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php?action=index">Kembali</a>
</body>
</html>