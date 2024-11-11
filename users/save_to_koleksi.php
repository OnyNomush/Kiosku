<?php
session_start();

// Koneksi ke database
$host = 'localhost';
$db = 'db_kiosku';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari body POST
$data = json_decode(file_get_contents('php://input'), true);
$productId = $data['productId'];

// Dapatkan ID pengguna dari session
$userId = $_SESSION['user_id']; 

// Simpan produk ke tabel koleksi
$sql = "INSERT INTO koleksi (user_id, product_id) VALUES ('$userId', '$productId')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $conn->error]);
}

$conn->close();
?>
