<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="/mahasiswa_mvc/assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Mahasiswa</h1>
        
        <form action="<?php echo BASE_URL; ?>?action=update" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($mahasiswa['id']); ?>">
            
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-input" value="<?php echo htmlspecialchars($mahasiswa['nama']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" class="form-input" value="<?php echo htmlspecialchars($mahasiswa['nim']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="jurusan">Jurusan:</label>
                <input type="text" id="jurusan" name="jurusan" class="form-input" value="<?php echo htmlspecialchars($mahasiswa['jurusan']); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        
        <a href="<?php echo BASE_URL; ?>?action=index" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>