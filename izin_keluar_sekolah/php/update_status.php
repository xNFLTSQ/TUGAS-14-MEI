<?php
include 'config.php';

$id = $_POST['id_izin'];
$status = $_POST['status'];

mysqli_query($conn, "UPDATE izin_keluar SET status='$status' WHERE id_izin='$id'");
header("Location: ../guru_dashboard.php");
?>