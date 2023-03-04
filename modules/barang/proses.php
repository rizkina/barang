<!-- Sistem Informasi Barang Sekolah
*******************************************************
* Rizki NA
-->


<?php
session_start();

// Call database.php connection for database connection
require_once "../../config/database.php";

// function to check user login status 
// if the user is not logged in, redirect to the login page and display the message = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// If the user is logged in, then run the commands for insert, update, and delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // retrieve submit result data from form
            $id_brg  = mysqli_real_escape_string($mysqli, trim($_POST['id_brg']));
            $id_jns  = mysqli_real_escape_string($mysqli, trim($_POST['id_jns']));
            $nm_brg  = mysqli_real_escape_string($mysqli, trim($_POST['nm_brg']));
            //$stok    = mysqli_real_escape_string($mysqli, trim($_POST['stok']));
            $satuan  = mysqli_real_escape_string($mysqli, trim($_POST['satuan']));

            $created_user = $_SESSION['id_user'];

            // query command to save data to the goods table
            $query = mysqli_query($mysqli, "INSERT INTO barang(id_brg,id_jns,nm_brg,satuan,created_user,updated_user) 
                                            VALUES('$id_brg','$id_jns','$nm_brg','$satuan','$created_user','$created_user')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // if successful display the message successfully save data
                header("location: ../../main.php?module=barang&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_brg'])) {
            // retrieve submit result data from form
                $id_brg  = mysqli_real_escape_string($mysqli, trim($_POST['id_brg']));
                $id_jns  = mysqli_real_escape_string($mysqli, trim($_POST['id_jns']));
                $nm_brg  = mysqli_real_escape_string($mysqli, trim($_POST['nm_brg']));
                //$stok    = mysqli_real_escape_string($mysqli, trim($_POST['stok']));
                $satuan  = mysqli_real_escape_string($mysqli, trim($_POST['satuan']));

                $updated_user = $_SESSION['id_user'];

                // query command to modify data in the goods table
                $query = mysqli_query($mysqli, "UPDATE barang SET   nm_brg          = '$nm_brg',
                                                                    id_jns          = '$id_jns',
                                                                    nm_brg          = '$nm_brg',
                                                                    satuan          = '$satuan',
                                                                    updated_user    = '$updated_user'
                                                              WHERE id_brg          = '$id_brg'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // if successful display a successful data update message
                    header("location: ../../main.php?module=barang&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_brg = $_GET['id'];

            // delete related records in the `order` table
            mysqli_query($mysqli, "DELETE FROM barang_in WHERE id_brg='$id_brg'");
            mysqli_query($mysqli, "DELETE FROM barang_out WHERE id_brg='$id_brg'");
    
            
            // query command to delete data in the Goods table
            $query = mysqli_query($mysqli, "DELETE FROM barang WHERE id_brg='$id_brg'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));
            
            // cek hasil query
            if ($query) {
            // if successful show message successfully delete data
                header("location: ../../main.php?module=barang&alert=3");
            }
        }
    }       
}       
?>