<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "db_kiosku";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];
        

        $password = ($password);

        $sql = mysqli_query($conn, "SELECT * FROM tb_user WHERE email='$email'");
        $data = mysqli_fetch_array($sql);
        $cml = mysqli_num_rows($sql);
        $password_asl = password_verify($password, $data['password']);
        

        if ($cml > 0) {
            echo "<script type='text/javascript'>
                alert('Selamat Datang, $email!');
                window.location.href = 'homepage.php';
                </script>";
        } else {
            echo "<script type='text/javascript'>
                alert('Login gagal! Periksa kembali email dan password Anda.');
                window.location.href = 'loginregister.php';
                </script>";
        }
    }

    if (isset($_POST['signup'])) {

        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_hsh = password_hash($password, PASSWORD_DEFAULT);

        $password = ($password);

        $sql = "INSERT INTO tb_user (nama, email, password) VALUES ('$nama', '$email', '$password_hsh')";

        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>
                alert('Registrasi berhasil. Silakan masuk.');
                window.location.href = 'loginregister.php';
                </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Login and Registration Form | Kiosku</title>
    <link rel="stylesheet" href="./css/logres.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
      function guestLogin() {
        window.location.href = 'homepage.php'; // Arahkan ke halaman yang diinginkan untuk pengguna guest
      }
    </script>
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
        <!-- Login Form -->
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

        <!-- Signup Form -->
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
</body>
</html>
