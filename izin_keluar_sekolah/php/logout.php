<?php
session_start();
session_unset(); // Hapus semua session
session_destroy(); // Hapus session dari server

// Redirect ke halaman login
header("Location: ../index.php");
exit();
?>
