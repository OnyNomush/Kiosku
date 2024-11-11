<?php
session_start();
$userId = $_SESSION['user_id'];

// Koneksi database
$host = 'localhost'; // Sesuaikan dengan nama host database Anda
$user = 'root';      // Sesuaikan dengan username MySQL Anda
$pass = '';          // Sesuaikan dengan password MySQL Anda
$db = 'db_kiosku';   // Nama database Anda

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM koleksi WHERE user_id = '$userId'";
$result = $conn->query($sql);

$produkList = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $productId = $row['product_id'];

        // Ambil detail produk dari tabel produk
        $productSql = "SELECT * FROM produk WHERE id = '$productId'";
        $productResult = $conn->query($productSql);
        if ($productResult) {
            $product = $productResult->fetch_assoc();
            $produkList[] = $product; // Simpan produk ke dalam array untuk ditampilkan di bagian HTML
        }
    }
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Anda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/koleksi.css"> <!-- Sesuaikan jika Anda menggunakan file CSS eksternal -->
    <style>
        .logo-img-navbar {
            width: 40px;
            height: 40px;
        }
        .koleksi-section {
            margin-top: 20px;
        }
        .koleksi-item {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
        }
        .koleksi-item img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid"> <!-- Menggunakan container-fluid agar memenuhi lebar halaman -->
            <a class="navbar-brand d-flex align-items-center mx-3" href="homepage.php">
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
                <a class="nav-link text-dark" href="homepage.php">Beranda</a>
                <a class="nav-link text-dark" href="koleksi.php">Koleksi</a>
                <a class="nav-link text-dark" href="profile.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg></a>
                <a class="nav-link text-dark" href="keranjang.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                </svg></a>
            </div>
        </div>
    </nav>

    <div class="container koleksi-section">
        <h2>Koleksi Anda</h2>
        <div class="row">
            <?php if (count($produkList) > 0) : ?>
                <?php foreach ($produkList as $produk) : ?>
                    <div class="col-md-4">
                        <div class="koleksi-item">
                            <img src="<?php echo $produk['gambar']; ?>" alt="<?php echo $produk['nama_produk']; ?>">
                            <h4><?php echo $produk['nama_produk']; ?></h4>
                            <p>Harga: <?php echo $produk['harga']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Tidak ada produk di koleksi Anda.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
