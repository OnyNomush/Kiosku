<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_kiosku";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$showBanModal = false;
$showWelcomeModal = false;
$showErrorModal = false;

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = mysqli_query($conn, "SELECT * FROM tb_user WHERE email='$email'");
  $data = mysqli_fetch_array($sql);
  $cml = mysqli_num_rows($sql);

  if ($cml > 0) {
      $password_asl = password_verify($password, $data['password']);

      if ($password_asl) {
          $ban_until = $data['ban_until'];
          if ($ban_until && strtotime($ban_until) > time()) {
              $showBanModal = true;
          } else {
              $showWelcomeModal = true;
          }
      } else {
          $showErrorModal = true;
      }
  } else {
      $showErrorModal = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login and Registration Form | Kiosku</title>
    <link rel="stylesheet" href="./css/logres.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="../aset/Aset Gambar/baju1.jpg" alt="">
                <div class="text">
                    <span class="text-1">Kebutuhan rumah tangga, mudah dan cepat. <br> Tunggu apa lagi?</span>
                    <span class="text-2">Ayo Terhubung!</span>
                </div>
            </div>
            <div class="back">
                <img src="../aset/Aset Gambar/minuman.jpg">
                <div class="text">
                    <span class="text-1">Temukan Semua yang Anda Butuhkan, Hanya di Kiosku!</span>
                    <span class="text-2">Mari kita mulai!</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Masuk</div>
                    <form action="loginregister.php" method="POST">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" placeholder="Masukkan Email" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Masukkan Password" required>
                            </div>
                            <div class="text"><a href="#">Lupa Password?</a></div>
                            <div class="button input-box">
                                <input type="submit" name="login" value="Konfirmasi">
                            </div>
                            <div class="text sign-up-text">Tidak punya akun? <label for="flip">Gabung sekarang!</label></div>
                        </div>
                    </form>
                </div>
                <div class="signup-form">
                    <div class="title">Daftar</div>
                    <form action="loginregister.php" method="POST">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" name="nama" placeholder="Masukkan Nama" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" placeholder="Masukkan Email" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Masukkan Password" required>
                            </div>
                            <div class="button input-box">
                                <input type="submit" name="signup" value="Konfirmasi">
                            </div>
                            <div class="text sign-up-text">Sudah punya akun? <label for="flip">Masuk sekarang!</label></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Section -->
    <div class="modal fade" id="banModal" tabindex="-1" role="dialog" aria-labelledby="banModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="banModalLabel">Akun Diblokir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Akun Anda diblokir hingga <?= $ban_until ?>.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="welcomeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="welcomeModalLabel">Selamat Datang!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Selamat datang, <?= htmlspecialchars($email) ?>!
                </div>
                <div class="modal-footer">
                  <a href="homepage.php" type="button" class="btn btn-warning">Lanjutkan</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Login Gagal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Login gagal! Periksa kembali email dan password Anda.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Pemberitahuan Registrasi -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title" id="registerModalLabel">Pemberitahuan Registrasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <p id="registerMessage">Registrasi berhasil. Silakan masuk untuk melanjutkan.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-warning" onclick="redirectToLogin()">Lanjutkan</button>
      </div>
    </div>
  </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      // Fungsi untuk menampilkan modal registrasi
      function showRegisterModal(pesan) {
    // Mengubah pesan di dalam modal sesuai dengan parameter yang diterima
    document.getElementById('registerMessage').innerText = pesan;

    // Menampilkan modal menggunakan Bootstrap
    var registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
    registerModal.show();
  }

      // Fungsi untuk mengarahkan ke halaman login
      function redirectToLogin() {
    window.location.href = 'loginregister.php';
  }
</script>
<script type="text/javascript">
        <?php if ($showBanModal) { ?>
            $(document).ready(function() {
                $('#banModal').modal('show');
            });
        <?php } elseif ($showWelcomeModal) { ?>
            $(document).ready(function() {
                $('#welcomeModal').modal('show');
            });
        <?php } elseif ($showErrorModal) { ?>
            $(document).ready(function() {
                $('#errorModal').modal('show');
            });
        <?php } ?>
    </script>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['signup'])) {
    $name = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hsh = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk memasukkan data pengguna ke dalam database
    $sql = "INSERT INTO tb_user (`name`, `email`, `password`) VALUES ('$name', '$email', '$password_hsh')";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
            showRegisterModal('Registrasi berhasil. Silakan masuk untuk melanjutkan.');
            console.log('berhasil');
        </script>";
    } else {
        echo "<script type='text/javascript'>
            showRegisterModal('Registrasi gagal. Silakan coba lagi.');
        </script>";
    }
}
}

$conn->close();

?>
