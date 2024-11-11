<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_kiosku");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil id_user dari URL
$id_user = $_GET['id_user'];

// Hitung waktu ban (1 minggu dari sekarang)
$ban_until = date('Y-m-d H:i:s', strtotime('+1 week'));

// Update kolom ban_until di tabel tb_user
$sql = "UPDATE tb_user SET ban_until='$ban_until' WHERE id_user=$id_user";
if ($conn->query($sql) === TRUE) {
    echo "Pengguna telah diblokir selama satu minggu.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
