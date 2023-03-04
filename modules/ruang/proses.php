<!-- Sistem Informasi Barang Sekolah
*******************************************************
* Rizki NA
-->


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
            $id_ruang  = mysqli_real_escape_string($mysqli, trim($_POST['id_ruang']));
            $nm_ruang  = mysqli_real_escape_string($mysqli, trim($_POST['nm_ruang']));
           
            $created_user = $_SESSION['id_user'];

            // query command to save data to the ruang table
            $query = mysqli_query($mysqli, "INSERT INTO ruang(id_ruang,nm_ruang,created_user,update_user) 
                                            VALUES('$id_ruang','$nm_ruang','$created_user','$created_user')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // if successful display the message successfully save data
                header("location: ../../main.php?module=ruang&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_ruang'])) {
                // retrieve the submitted data from the form
                $id_ruang  = mysqli_real_escape_string($mysqli, trim($_POST['id_ruang']));
                $nm_ruang  = mysqli_real_escape_string($mysqli, trim($_POST['nm_ruang']));
                
                $updated_user = $_SESSION['id_user'];

                // query command to modify data in the space table
                $query = mysqli_query($mysqli, "UPDATE ruang SET    nm_ruang        = '$nm_ruang',
                                                                    update_user     = '$updated_user'
                                                              WHERE id_ruang        = '$id_ruang'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // if successful display a successful data update message
                    header("location: ../../main.php?module=ruang&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_ruang = $_GET['id'];
    
            // query command to delete data in the  ruang table
            $query = mysqli_query($mysqli, "DELETE FROM ruang WHERE id_ruang='$id_ruang'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // if successful display the message successfully delete data
                header("location: ../../main.php?module=ruang&alert=3");
            }
        }
    }       
}       
?>