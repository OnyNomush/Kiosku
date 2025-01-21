<?php
session_start();

if (empty($_SESSION['cart'])) {
    echo "Keranjang kosong.";
    exit();
}

require_once './vendor/midtrans/midtrans-php/Midtrans.php';

// Konfigurasi Midtrans
\Midtrans\Config::$serverKey = 'SB-Mid-server-d72AjCAmPLMERsc7kdmLYoTG'; // Ganti dengan server key Anda
\Midtrans\Config::$clientKey = 'SB-Mid-client-hu6s9vgbLiwNxbDC';         // Ganti dengan client key Anda
\Midtrans\Config::$isProduction = false;

// Ambil data dari keranjang
$items = [];
$totalPrice = 0;
foreach ($_SESSION['cart'] as $item) {
    $items[] = [
        'id' => $item['id'],
        'price' => $item['price'],
        'quantity' => $item['quantity'],
        'name' => $item['name']
    ];
    $totalPrice += $item['price'] * $item['quantity'];
}

// Data transaksi
$transaction_details = [
    'order_id' => 'ORDER-' . uniqid(),
    'gross_amount' => $totalPrice,
];

// Kontak pelanggan
$customer_details = [
    'first_name' => 'Deva',
    'last_name' => 'Athailah',
    'email' => 'athaillahdeva1109@gmail.com',
    'phone' => '08123456789',
];

// Data yang dikirim ke Midtrans
$transaction_data = [
    'transaction_details' => $transaction_details,
    'item_details' => $items,
    'customer_details' => $customer_details,
];

try {
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        h2 {
            color: #FBBA00;
        }

        p {
            font-size: 18px;
            margin: 15px 0;
        }

        #pay-button {
            background-color: #FBBA00;
            color: #222;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #pay-button:hover {
            background-color: #e0a600;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #333;
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #FBBA00;
        }

        footer a {
            color: #FBBA00;
            text-decoration: none;
            font-weight: bold;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Halaman Pembayaran</h2>
    <p>Silakan lanjutkan pembayaran menggunakan metode yang tersedia di Midtrans.</p>
    <button id="pay-button">Bayar Sekarang</button>

    <footer>
        &copy; 2025 <a href="#">Kiosku</a>. Semua hak dilindungi.
    </footer>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-hu6s9vgbLiwNxbDC"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function () {
            snap.pay('<?php echo $snapToken ?>', {
                onSuccess: function(result) {
                    alert("Pembayaran berhasil!");
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

