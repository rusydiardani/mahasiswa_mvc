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
                header("Location: index.php?action=index");
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
            header("Location: index.php?action=index");
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
                header("Location: index.php?action=index");
                exit();
            } else {
                echo "Gagal memperbarui data.";
            }
        } else {
            header("Location: index.php?action=index");
            exit();
        }
    }

    // DELETE: Proses penghapusan data
    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($this->model->deleteMahasiswa($id)) {
                header("Location: index.php?action=index");
                exit();
            } else {
                echo "Gagal menghapus data.";
            }
        } else {
            echo "ID tidak ditemukan.";
        }
    }
}