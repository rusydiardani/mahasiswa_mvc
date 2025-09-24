<?php
// /app/models/MahasiswaModel.php

class MahasiswaModel {
    private $db;

    public function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->db->connect_error) {
            die("Koneksi gagal: " . $this->db->connect_error);
        }
    }

    // CREATE: Menambahkan data mahasiswa baru
    public function addMahasiswa($nama, $nim, $jurusan) {
        $stmt = $this->db->prepare("INSERT INTO mahasiswa (nama, nim, jurusan) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $nim, $jurusan);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // READ: Mengambil semua data mahasiswa
    public function getAllMahasiswa() {
        $sql = "SELECT * FROM mahasiswa";
        $result = $this->db->query($sql);
        $mahasiswa = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $mahasiswa[] = $row;
            }
        }
        return $mahasiswa;
    }

    // READ: Mengambil data mahasiswa berdasarkan ID
    public function getMahasiswaById($id) {
        $stmt = $this->db->prepare("SELECT * FROM mahasiswa WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $mahasiswa = $result->fetch_assoc();
        $stmt->close();
        return $mahasiswa;
    }

    // UPDATE: Memperbarui data mahasiswa
    public function updateMahasiswa($id, $nama, $nim, $jurusan) {
        $stmt = $this->db->prepare("UPDATE mahasiswa SET nama = ?, nim = ?, jurusan = ? WHERE id = ?");
        $stmt->bind_param("sssi", $nama, $nim, $jurusan, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // DELETE: Menghapus data mahasiswa
    public function deleteMahasiswa($id) {
        $stmt = $this->db->prepare("DELETE FROM mahasiswa WHERE id = ?");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    
    // UTILITY: Mereset AUTO_INCREMENT ID menjadi 1
    public function resetAutoIncrement() {
        $sql = "ALTER TABLE mahasiswa AUTO_INCREMENT = 1";
        $result = $this->db->query($sql);
        return $result;
    }
}