<?php
session_start();

// Jika keranjang kosong, redirect kembali ke halaman keranjang
if (empty($_SESSION['cart'])) {
    header('Location: keranjang.php');
    exit();
}

// Pastikan Anda sudah mengganti dengan Server Key dan Client Key Anda
require_once './vendor/midtrans/midtrans-php/Midtrans.php';

// Set konfigurasi Midtrans (gunakan akun sandbox untuk testing)
\Midtrans\Config::$serverKey = 'SB-Mid-server-d72AjCAmPLMERsc7kdmLYoTG';  // Ganti dengan Server Key Anda
\Midtrans\Config::$clientKey = 'SB-Mid-client-hu6s9vgbLiwNxbDC';  // Ganti dengan Client Key Anda
\Midtrans\Config::$isProduction = false;  // Ubah menjadi true untuk production

// Ambil data dari keranjang
$items = [];
foreach ($_SESSION['cart'] as $item) {
    $items[] = [
        'id' => $item['id'],
        'price' => $item['price'],
        'quantity' => $item['quantity'],
        'name' => $item['name']
    ];
}

// Total harga
$totalPrice = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalPrice += $item['price'] * $item['quantity'];
}

// Data transaksi
$transaction_details = array(
    'order_id' => 'ORDER-' . rand(),
    'gross_amount' => $totalPrice,  // Jumlah total
);

// Item yang dibeli
$item_details = $items;

// Kontak pelanggan
$customer_details = array(
    'first_name'    => 'Nama Depan',  // Ganti dengan data pengguna
    'last_name'     => 'Nama Belakang',
    'email'         => 'email@domain.com',
    'phone'         => '08123456789',
);

// Kirimkan data transaksi ke Midtrans
$transaction_data = array(
    'transaction_details' => $transaction_details,
    'item_details'        => $item_details,
    'customer_details'    => $customer_details
);

try {
    // Proses pembayaran menggunakan Midtrans Snap
    $snapToken = \Midtrans\Snap::getSnapToken($transaction_data);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
</head>
<body>
    <h2>Halaman Pembayaran</h2>
    <p>Silakan lanjutkan pembayaran menggunakan metode yang tersedia di Midtrans.</p>
    <button id="pay-button">Bayar Sekarang</button>

    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="YOUR_CLIENT_KEY"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function () {
            snap.pay('<?php echo $snapToken ?>', {
                onSuccess: function(result) {
                    alert("Pembayaran berhasil!");
                    // Arahkan ke halaman terima kasih atau transaksi selesai
                },
                onPending: function(result) {
                    alert("Pembayaran tertunda!");
                },
                onError: function(result) {
                    alert("Pembayaran gagal!");
                }
            });
        }
    </script>
</body>
</html>
