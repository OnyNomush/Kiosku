<?php
$servername = "localhost"; // Server default untuk XAMPP adalah "localhost"
$username = "root"; // Username default XAMPP biasanya "root"
$password = ""; // Password default XAMPP biasanya kosong
$dbname = "db_kiosku"; // Ganti dengan nama database Anda, misalnya "db_kiosku"

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
