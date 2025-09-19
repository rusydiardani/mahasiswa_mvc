<?php
// /public/index.php

// Panggil file konfigurasi dan controller
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/controllers/MahasiswaController.php';

// Tentukan controller dan method yang akan dijalankan
$controller = new MahasiswaController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Jalankan method yang sesuai
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Halaman tidak ditemukan.";
}