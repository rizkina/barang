<?php
session_start();

// Call database.php connection for database connection
require_once "../../config/database.php";

// function for checking user login status 
// if the user has not logged in, redirect to the login page and display the message = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// If the user is logged in, then run the commands for insert, update, and delete.
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // retrieve the submitted data from the form
            $kode_transaksi = mysqli_real_escape_string($mysqli, trim($_POST['kode_transaksi']));
            
            $tanggal         = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_keluar']));
            $exp             = explode('-',$tanggal);
            $tanggal_keluar  = $exp[2]."-".$exp[1]."-".$exp[0];
            
            $kode_barang     = mysqli_real_escape_string($mysqli, trim($_POST['prdId']));
            $jumlah_keluar   = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_keluar']));
            $total_stok      = mysqli_real_escape_string($mysqli, trim($_POST['st']));
            
            $created_user    = $_SESSION['id_user'];

            // query command to save data to the Incoming goods table
            $query = mysqli_query($mysqli, "INSERT INTO barang_out(id_out,date_out,id_brg,jml_keluar,created_user) 
                                            VALUES('$kode_transaksi','$tanggal_keluar','$kode_barang','$jumlah_keluar','$created_user')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // query command to change data in the Goods table
                $query1 = mysqli_query($mysqli, "UPDATE barang SET stok        = '$total_stok'
                                                              WHERE id_brg     = '$kode_barang'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query1) {                       
                    // if successful display the message successfully save data
                    header("location: ../../main.php?module=barang_out&alert=1");
                }
            }   
        }   
    }
}       
?>