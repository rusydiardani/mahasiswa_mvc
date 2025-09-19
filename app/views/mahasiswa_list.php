<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <a href="index.php?action=create">Tambah Mahasiswa Baru</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $m): ?>
                <tr>
                    <td><?php echo htmlspecialchars($m['id']); ?></td>
                    <td><?php echo htmlspecialchars($m['nama']); ?></td>
                    <td><?php echo htmlspecialchars($m['nim']); ?></td>
                    <td><?php echo htmlspecialchars($m['jurusan']); ?></td>
                    <td>
                        <a href="index.php?action=edit&id=<?php echo htmlspecialchars($m['id']); ?>">Edit</a> | 
                        <a href="index.php?action=delete&id=<?php echo htmlspecialchars($m['id']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>