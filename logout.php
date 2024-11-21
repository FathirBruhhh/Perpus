// logout.php
<?php
session_start();
session_unset(); // Menghapus semua session
session_destroy(); // Menghancurkan sesi
header("Location: index.php"); // Kembali ke halaman login
exit();
?>
