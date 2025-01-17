<?php
// notif.php
$notif = json_decode(file_get_contents('php://input'), true);

// Proses pembayaran dan update status
if ($notif['transaction_status'] == 'settlement') {
    // Pembayaran berhasil
    echo 'Pembayaran berhasil!';
} else {
    // Pembayaran gagal
    echo 'Pembayaran gagal!';
}
?>
