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

// Simpan produk ke tabel koleksi dengan prepared statement
$stmt = $conn->prepare("INSERT INTO koleksi (user_id, product_id, created_at) VALUES (?, ?, NOW())");
$stmt->bind_param("ii", $userId, $productId); // "ii" menunjukkan bahwa kedua parameter adalah integer

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
