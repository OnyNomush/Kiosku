<?php
session_start();

// Simpan produk ke dalam sesi
if (isset($_POST['add_to_cart'])) {
    $product = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'quantity' => 1
    ];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Cek apakah produk sudah ada di keranjang
    $isProductInCart = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] === $product['id']) {
            $item['quantity'] += 1; // Tambahkan jumlah jika produk sudah ada
            $isProductInCart = true;
            break;
        }
    }

    // Jika produk belum ada di keranjang, tambahkan
    if (!$isProductInCart) {
        $_SESSION['cart'][] = $product;
    }

    header('Location: keranjang.php'); // Redirect ke halaman keranjang
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="homepage.php">
                <img src="../aset/icon/kioskuu.jpg" alt="Kiosku Logo" class="rounded-circle" width="40" height="40">
                <span class="ml-2"><b>Kiosku</b></span>
            </a>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img src="../aset/Aset Gambar/rotisisir.jpg" class="img-fluid rounded" alt="Gambar Produk">
            </div>
            <div class="col-md-6">
                <h2>ROTI Ngawi</h2>
                <p class="text-muted">Kategori: Makanan</p>
                <div class="d-flex align-items-center mb-3">
                    <span class="badge badge-success mr-2">5</span>
                    <small class="text-muted">(1 ulasan)</small>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <h4 class="text">Rp 150.000</h4>
                <p class="mt-4">
                    Deskripsi produk ini memberikan informasi detail tentang produk, termasuk fitur dan bahan yang digunakan. Produk ini sangat nyaman dan gaya, cocok untuk berbagai acara.
                </p>

                <!-- Form untuk menambahkan produk ke keranjang -->
                <form method="POST" action="">
                    <input type="hidden" name="id" value="1"> <!-- ID produk -->
                    <input type="hidden" name="name" value="ROTI Ngawi"> <!-- Nama produk -->
                    <input type="hidden" name="price" value="150000"> <!-- Harga produk -->
                    <button type="submit" name="add_to_cart" class="btn btn-warning btn-lg mt-3">
                        <i class="fa fa-cart-plus"></i> Tambahkan ke Keranjang
                    </button>
                </form>
            </div>
        </div>
    </div>
    <br><br><br>
    <footer class="bg-dark text-white py-3 text-center">
        <p>&copy; 2024 Kiosku. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS dan dependensinya -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.fa-star');
            stars.forEach((star, index) => {
                star.addEventListener('click', () => {
                    stars.forEach((s, i) => {
                        if (i <= index) {
                            s.classList.add('checked');
                        } else {
                            s.classList.remove('checked');
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
