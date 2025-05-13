<?php
session_start();
include 'php/config.php';
include 'php/includes/header.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_user FROM users WHERE username='$username'"));
$id_user = $user['id_user'];

$result = mysqli_query($conn, "SELECT * FROM izin_keluar WHERE id_user = '$id_user' ORDER BY tanggal DESC");

echo "<h2>Status Izin Saya</h2>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div style='border:1px solid #ccc;padding:10px;margin:10px;'>";
    echo "<strong>Tanggal:</strong> " . $row['tanggal'] . "<br>";
    echo "<strong>Jam:</strong> " . $row['jam'] . "<br>";
    echo "<strong>Alasan:</strong> " . $row['alasan'] . "<br>";
    echo "<strong>Status:</strong> <b>" . strtoupper($row['status']) . "</b><br>";
    echo "<img src='uploads/" . $row['foto'] . "' width='100'><br>";
    echo "</div>";
}

include 'footer.php';
?>