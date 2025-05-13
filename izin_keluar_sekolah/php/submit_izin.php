<?php
session_start();
include 'config.php';

$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$alasan = $_POST['alasan'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
move_uploaded_file($tmp, "../uploads/" . $foto);

// Simpan data
$username = $_SESSION['username'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_user FROM users WHERE username='$username'"));
$id_user = $user['id_user'];

$query = "INSERT INTO izin_keluar (id_user, nama, kelas, tanggal, jam, alasan, foto, status)
          VALUES ('$id_user', '$nama', '$kelas', '$tanggal', '$jam', '$alasan', '$foto', 'menunggu')";
mysqli_query($conn, $query);

header("Location: ../status_izin.php");
exit();
?>