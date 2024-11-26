<?php
// Konfigurasi database
$host = 'localhost'; // Server database
$user = 'root';      // Username database
$password = '';      // Password database (kosong jika default)
$dbname = 'akreditasi_db'; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Set karakter encoding untuk mencegah masalah karakter
$conn->set_charset("utf8");

// Debugging jika koneksi berhasil
// echo "Koneksi berhasil!";
?>
