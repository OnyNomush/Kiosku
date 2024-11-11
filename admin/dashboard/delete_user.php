<?php
$conn = new mysqli("localhost", "root", "", "db_kiosku");
$id_user = $_GET['id_user'];
$conn->query("DELETE FROM tb_user WHERE id_user=$id_user");
$conn->close();
header("Location: Users.php");
?>
