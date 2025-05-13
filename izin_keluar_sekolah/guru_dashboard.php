<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'guru') {

    header("Location: index.php");
    exit();
}
include 'php/config.php';
include 'php/includes/header.php';

$result = mysqli_query($conn, "SELECT * FROM izin_keluar INNER JOIN users ON izin_keluar.id_user = users.id_user");

echo "<h2>Daftar Izin Siswa</h2>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div style='border:1px solid #ccc;padding:10px;margin:10px;'>";
    echo "<strong>Nama:</strong> " . $row['nama'] . "<br>";
    echo "<strong>Kelas:</strong> " . $row['kelas'] . "<br>";
    echo "<strong>Tanggal:</strong> " . $row['tanggal'] . "<br>";
    echo "<strong>Jam:</strong> " . $row['jam'] . "<br>";
    echo "<strong>Alasan:</strong> " . $row['alasan'] . "<br>";
    echo "<img src='uploads/" . $row['foto'] . "' width='100'><br>";
    echo "<form method='POST' action='php/update_status.php'>
            <input type='hidden' name='id_izin' value='" . $row['id_izin'] . "'>
            <select name='status'>
                <option value='disetujui'>Setujui</option>
                <option value='ditolak'>Tolak</option>
            </select>
            <button type='submit'>Kirim</button>
          </form>";
    echo "</div>";
}

include 'php/includes/footer.php';
?>
