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
// if the user is already logged in, then run the command to change the password
else {
    if (isset($_POST['simpan'])) {
        if (isset($_SESSION['id_user'])) {
            // retrieve the submitted data from the form
            $old_pass    = md5(mysqli_real_escape_string($mysqli, trim($_POST['old_pass'])));
            $new_pass    = md5(mysqli_real_escape_string($mysqli, trim($_POST['new_pass'])));
            $retype_pass = md5(mysqli_real_escape_string($mysqli, trim($_POST['retype_pass'])));

            // retrieve user session result data
            $id_user = $_SESSION['id_user'];

            // selection of passwords from the user table to check
            $sql = mysqli_query($mysqli, "SELECT password FROM users WHERE id_user=$id_user")
                                          or die('Ada kesalahan pada query seleksi password : '.mysqli_error($mysqli));
            $data = mysqli_fetch_assoc($sql);

            // function to check the password before it is changed 
            // if the old password input does not match the password in the database, 
            // redirect to the password change page and display a message = 1
            if ($old_pass != $data['password']){
                header("Location: ../../main.php?module=password&alert=1");
            }

            // if the old password input is the same as the password in the database, execute the command to check further.
            else {

                // if the new password input is not the same as the repeat new password input, 
                // redirect to password change page and display message = 2
                if ($new_pass != $retype_pass){
                        header("Location: ../../main.php?module=password&alert=2");
                }

                // In addition, run the update password command
                else {
                    // query command to modify data in the user table
                    $query = mysqli_query($mysqli, "UPDATE users SET password = '$new_pass'
                                                                  WHERE id_user  = '$id_user'")
                                                    or die('Ada kesalahan pada query update password : '.mysqli_error($mysqli));   

                    // cek query
                    if ($query) {
                        // if successful display a successful data update message
                        header("location: ../../main.php?module=password&alert=3");
                    }   
                }
            }
        }
    }   
}               
?>