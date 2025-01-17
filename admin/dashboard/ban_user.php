<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_kiosku");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil id_user dari URL
$id_user = $_GET['id_user'];

// Hitung waktu ban (1 minggu dari sekarang)
$ban_until = date('Y-m-d H:i:s', strtotime('+1 week'));

// Update kolom ban_until di tabel tb_user
$sql = "UPDATE tb_user SET ban_until='$ban_until' WHERE id_user=$id_user";
$success = false;
if ($conn->query($sql) === TRUE) {
    $success = true;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ban User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="banModal" tabindex="-1" aria-labelledby="banModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="banModalLabel">Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    if ($success) {
                        echo "Pengguna telah diblokir selama satu minggu.";
                    } else {
                        echo "Terjadi kesalahan saat memblokir pengguna.";
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Tampilkan modal saat halaman dimuat
            $('#banModal').modal('show');

            // Kembali ke halaman Users setelah modal ditutup
            $('#banModal').on('hidden.bs.modal', function () {
                window.location.href = 'Users.php';
            });
        });
    </script>
</body>
</html>
