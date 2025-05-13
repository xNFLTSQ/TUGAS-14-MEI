<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'siswa') {
    header(header: "index.php");
    exit();
}
include 'php/includes/header.php';
?>

<h2>Form Izin Keluar Sekolah</h2>
<form method="POST" action="php/submit_izin.php" enctype="multipart/form-data">
    <input type="text" name="nama" placeholder="Nama Lengkap" required><br>
    <input type="text" name="kelas" placeholder="Kelas" required><br>
    <input type="date" name="tanggal" required><br>
    <input type="time" name="jam" required><br>
    <textarea name="alasan" placeholder="Alasan Izin" required></textarea><br>

    <label>Ambil Foto (Full Body)</label><br>
    <input type="file" name="foto" accept="image/*" capture="environment" required><br>

    <button type="submit">Kirim Izin</button>
</form>

<?php include 'php/includes/footer.php'; ?>
