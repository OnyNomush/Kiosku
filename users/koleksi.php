<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi</title>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <a class="nav-link text-dark" href="profiletest.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                </a>
                <a class="nav-link text-dark" href="keranjang.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                    </svg>
                </a>
            </div>
        </div>
    </nav>

    <div class="container koleksi-section">
        <h2>Koleksi Anda</h2>
        <div class="col-3">
    <div class="product-box border p-3 rounded shadow-lg">
        <a href="produk.php">
            <img src="../aset/Aset Gambar/rotisisir.jpg" alt="Produk 1" class="img-fluid rounded mb-3">
        </a>
        <p class="product-name text-center">ROTI Ngawi</p>
        <p class="product-price text-center">Rp40.000</p>
        <!-- Tombol Hapus dengan warna oranye -->
        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-warning btn-sm" onclick="confirmDelete(this)">
                <i class="fa fa-trash"></i> Hapus dari koleksi
            </button>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus Produk -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Penghapusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus produk ini dari koleksi Anda?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-outline-warning" id="confirmDeleteButton">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
    let currentCard = null; // Menyimpan card yang akan dihapus

    // Fungsi untuk memanggil modal konfirmasi
    function confirmDelete(button) {
        currentCard = button.closest('.col-3'); // Menyimpan elemen card produk
        $('#deleteModal').modal('show'); // Menampilkan modal
    }

    // Fungsi untuk menghapus produk setelah konfirmasi
    document.getElementById('confirmDeleteButton').addEventListener('click', function() {
        if (currentCard) {
            currentCard.style.display = 'none'; // Menyembunyikan card produk
        }
        $('#deleteModal').modal('hide'); // Menutup modal
    });
</script>

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Bootstrap JS dan dependensinya -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>


        

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
