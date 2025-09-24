<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="/mahasiswa_mvc/assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Daftar Mahasiswa</h1>
        <a href="?action=create" class="btn btn-success">Tambah Data Mahasiswa</a>
        <table class="data-table">
            <thead>
                <tr>
                    <th>No.</th> 
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Line 24 (atau di sekitar sini) dimulai inisialisasi counter
                $i = 1; 
                foreach ($mahasiswa as $m): 
                ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo htmlspecialchars($m['nama']); ?></td>
                        <td><?php echo htmlspecialchars($m['nim']); ?></td>
                        <td><?php echo htmlspecialchars($m['jurusan']); ?></td>
                        <td>
                            <a href="?action=edit&id=<?php echo htmlspecialchars($m['id']); ?>" class="btn btn-warning">Edit</a>
                            <a href="?action=delete&id=<?php echo htmlspecialchars($m['id']); ?>" 
                               class="btn btn-danger" 
                               onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>