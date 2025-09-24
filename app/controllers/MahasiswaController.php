<?php
// /app/controllers/MahasiswaController.php

require_once __DIR__ . '/../models/MahasiswaModel.php';

class MahasiswaController {
    private $model;

    public function __construct() {
        $this->model = new MahasiswaModel();
    }

    // READ: Tampilkan semua data
    public function index() {
        $mahasiswa = $this->model->getAllMahasiswa();
        include __DIR__ . '/../views/mahasiswa_list.php';
    }

    // CREATE: Tampilkan form dan proses data
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $jurusan = $_POST['jurusan'];
            if ($this->model->addMahasiswa($nama, $nim, $jurusan)) {
                header("Location: " . BASE_URL . "?action=index");
                exit();
            } else {
                echo "Gagal menambahkan data.";
            }
        } else {
            include __DIR__ . '/../views/mahasiswa_form.php';
        }
    }

    // UPDATE: Tampilkan form dengan data lama
    public function edit() {
        if (!isset($_GET['id'])) {
            header("Location: " . BASE_URL . "?action=index");
            exit();
        }

        $mahasiswa = $this->model->getMahasiswaById($_GET['id']);
        if (!$mahasiswa) {
            echo "Data tidak ditemukan.";
            exit();
        }
        include __DIR__ . '/../views/mahasiswa_edit.php';
    }

    // UPDATE: Proses data yang diperbarui
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $jurusan = $_POST['jurusan'];
            if ($this->model->updateMahasiswa($id, $nama, $nim, $jurusan)) {
                header("Location: " . BASE_URL . "?action=index");
                exit();
            } else {
                echo "Gagal memperbarui data.";
            }
        } else {
            header("Location: " . BASE_URL . "?action=index");
            exit();
        }
    }

    // DELETE: Proses penghapusan data
    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($this->model->deleteMahasiswa($id)) {
                header("Location: " . BASE_URL . "?action=index");
                exit();
            } else {
                echo "Gagal menghapus data.";
            }
        } else {
            echo "ID tidak ditemukan.";
        }
    }

    // UTILITY: Mereset ID ke 1 (Hanya jika tabel kosong)
    public function resetid() {
        $mahasiswa = $this->model->getAllMahasiswa();
        
        if (empty($mahasiswa)) {
            if ($this->model->resetAutoIncrement()) {
                header("Location: " . BASE_URL . "?action=index&status=reset_success");
                exit();
            } else {
                echo "Gagal mereset ID.";
            }
        } else {
            echo "Tabel tidak kosong. Hapus semua data terlebih dahulu.";
        }
    }
}