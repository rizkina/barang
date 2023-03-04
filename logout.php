<!-- Sistem Informasi Barang Sekolah
*******************************************************
* Rizki NA
-->

<?php
session_start();
// delete session
session_destroy();

// redirect to login page (index.php) and give alert = 2
header('Location: index.php?alert=2');
?>