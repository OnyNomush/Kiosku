<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiosku - Beranda</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/homeguest.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="content flex-grow-1">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center mx-3" href="#">
                    <img src="../aset/icon/kioskuu.jpg" alt="Kiosku Logo" class="rounded-circle logo-img-navbar">
                    <span class="ml-2"><b>Kiosku</b></span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <div class="input-group search-bar mx-5">
                        <input type="text" class="form-control" placeholder="Cari produk di Kiosku...">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="button">Cari</button>
                        </div>
                    </div>
                </div>
                <div class="navbar-nav ml-auto d-flex align-items-center">
                    <!-- Tombol Masuk -->
                    <button class="btn btn-orange mx-2" onclick="window.location.href='../users/loginregister.php'">Masuk</button>
                    <!-- Tombol Daftar -->
                    <button class="btn btn-white-orange mx-2" onclick="window.location.href='../users/loginregister.php'">Daftar</button>
                </div>
            </div>
        </nav>

        <!-- Konten lainnya -->
        <span class="badge text-bg-secondary ms-3">Semua</span>
        <div class="container my-5 ms-2">
            <h2>Rekomendasi</h2>
            <div class="row">
                <div id="product-link" class="col-3">
                    <div class="product-box">
                        <img src="../aset/Aset Gambar/rotisisir.jpg" alt="Produk 1" class="img-fluid">
                        <p class="product-name">ROTI Ngawi</p>
                        <p class="product-price">Rp40.000</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper">
            <div class="content">
                <!-- Konten utama halaman Anda di sini -->
            </div>
            <footer class="text-center">
                <p>&copy; 2024 Kiosku. All Rights Reserved.</p>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        document.getElementById('product-link').addEventListener('click', function() {
            window.location.href = 'produk.php';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
