<?php
session_start();

// Call database.php connection for database connection
require_once "../../config/database.php";

// function to check user login status 
// if the user is not logged in, redirect to the login page and display the message = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
    exit();
}

// If the user is logged in, then run the commands for insert, update, and delete
if ($_GET['act']=='insert') {
    if (isset($_POST['simpan'])) {
// retrieve submit result data from form
        $kode_transaksi = mysqli_real_escape_string($mysqli, trim($_POST['kode_transaksi']));

        $tanggal        = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_masuk']));
        $exp            = explode('-', $tanggal);
        $tanggal_masuk  = $exp[2] . "-" . $exp[1] . "-" . $exp[0];

        $kode_barang    = mysqli_real_escape_string($mysqli, trim($_POST['prdId']));
        $jumlah_masuk   = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_masuk']));
        $total_stok     = mysqli_real_escape_string($mysqli, trim($_POST['total_stok']));
        //$ruang_id     = mysqli_real_escape_string($mysqli, trim($_POST['ruangId']));

        $created_user   = $_SESSION['id_user'];

        // query command to save data to the incoming goods table
        $query = mysqli_query($mysqli, "INSERT INTO barang_in(id_in,date_in,id_brg,jml_in,created_user) 
                                        VALUES ('$kode_transaksi','$tanggal_masuk','$kode_barang','$jumlah_masuk','$created_user')")
            or die('Ada kesalahan pada query insert ke barang_in: ' . mysqli_error($mysqli));
        
        // cek query
        if ($query) {
            // query command to change data in the goods table
            $query1 = mysqli_query($mysqli, "UPDATE barang SET stok = stok + '$total_stok' WHERE id_brg = '$kode_barang'")
                or die('Ada kesalahan pada query update ke barang: ' . mysqli_error($mysqli));

            // cek query
            if ($query1) {
                // if successful display the message successfully save data
                header("location: ../../main.php?module=barang_in&alert=1");
                exit();
            }
        }
    }
}
else {
    echo "Invalid action";
}