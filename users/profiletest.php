<?php
// Ambil data dari session atau database setelah login
$name = 'Deva'; // Ganti dengan data asli
$email = 'athaillahdeva1109@gmail.com'; // Ganti dengan data asli
$phone = ''; // Ganti dengan data nomor telepon jika ada
$address = ''; // Ganti dengan data alamat jika ada
$profile_picture = 'path/to/photo.jpg'; // Ganti dengan path foto profil yang ada

// Jika profil kosong, gunakan ilustrasi default
$default_profile_picture = 'path/to/default_profile_picture.jpg';
if (empty($profile_picture)) {
    $profile_picture = $default_profile_picture;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Kiosku</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .profile-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }
        .img-profile {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #FBBA00;
        }
        .btn-custom {
            background-color: #FBBA00;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #e6a800;
        }
        .form-control {
            border-radius: 5px;
        }
        .logout-btn {
            background-color: #dc3545;
            color: white;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center mx-3" href="homepage.php">
                <img src="../aset/icon/kioskuu.jpg" alt="Kiosku Logo" class="rounded-circle" width="40" height="40">
                <span class="ml-2"><b>Kiosku</b></span>
            </a>
            <div class="collapse navbar-collapse justify-content-center">
                <div class="input-group search-bar mx-5">
                    <input type="text" class="form-control" placeholder="Cari produk di Kiosku...">
                    <div class="input-group-append">
                        <button class="btn btn-dark">Cari</button>
                    </div>
                </div>
            </div>
            <div class="navbar-nav ml-auto d-flex align-items-center">
                <a class="nav-link text-dark" href="homepage.php">Beranda</a>
                <a class="nav-link text-dark" href="koleksi.php">Koleksi</a>
                <a class="nav-link text-dark" href="profiletest.php">
                    <i class="fas fa-user-circle"></i>
                </a>
                <a class="nav-link text-dark" href="keranjang.php">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
    </nav>

    <!-- Profile Section -->
    <div class="container my-5">
        <div class="profile-container">
            <h2 class="text-center mb-4">Profil Pengguna</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="<?php echo htmlspecialchars($profile_picture); ?>" alt="Foto Profil" class="img-profile mb-3">
                    <button class="btn btn-custom btn-sm mb-3" onclick="document.getElementById('photoInput').click()">Ubah Foto Profil</button>
                    <input type="file" id="photoInput" class="d-none" onchange="uploadPhoto(event)">
                </div>
                <div class="col-md-8">
                    <form>
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($name); ?>" placeholder="Masukkan nama">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" placeholder="Masukkan email">
                        </div>
                        <div class="form-group">
                            <label>No Telepon:</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($phone); ?>" placeholder="Masukkan nomor telepon">
                        </div>
                        <div class="form-group">
                            <label>Alamat:</label>
                            <textarea class="form-control" rows="3" placeholder="Masukkan alamat"><?php echo htmlspecialchars($address); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-custom mt-3">Simpan Perubahan</button>
                        <a href="loginregister.php" type="submit" class="btn btn-danger mt-3">Logout</type=>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk upload foto -->
    <script>
        function uploadPhoto(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.img-profile').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
