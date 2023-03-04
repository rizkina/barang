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
// if the user is already logged in, then run the commands for insert and update
else {
	// insert data
	if ($_GET['act']=='insert') {
		if (isset($_POST['simpan'])) {
			// retrieve the submitted data from the form
			$username  = mysqli_real_escape_string($mysqli, trim($_POST['username']));
			$password  = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
			$nama_user = mysqli_real_escape_string($mysqli, trim($_POST['nama_user']));
			$nip	   = mysqli_real_escape_string($mysqli, trim($_POST['nip']));
			$hak_akses = mysqli_real_escape_string($mysqli, trim($_POST['hak_akses']));

			// query command to save data to the users table
            $query = mysqli_query($mysqli, "INSERT INTO users(username,password,nama_user,nip,hak_akses)
                                            VALUES('$username','$password','$nama_user','$nip','$hak_akses')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // if successful display the message successfully save data
                header("location: ../../main.php?module=user&alert=1");
            }
		}	
	}
	
	// update data
	elseif ($_GET['act']=='update') {
		if (isset($_POST['simpan'])) {
			if (isset($_POST['id_user'])) {
				// retrieve the submitted data from the form
				$id_user            = mysqli_real_escape_string($mysqli, trim($_POST['id_user']));
				$username           = mysqli_real_escape_string($mysqli, trim($_POST['username']));
				$password           = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
				$nama_user          = mysqli_real_escape_string($mysqli, trim($_POST['nama_user']));
				$nip	   			= mysqli_real_escape_string($mysqli, trim($_POST['nip']));
				$email              = mysqli_real_escape_string($mysqli, trim($_POST['email']));
				$hp            		= mysqli_real_escape_string($mysqli, trim($_POST['hp']));
				$hak_akses          = mysqli_real_escape_string($mysqli, trim($_POST['hak_akses']));
				
				$nama_file          = $_FILES['foto']['name'];
				$ukuran_file        = $_FILES['foto']['size'];
				$tipe_file          = $_FILES['foto']['type'];
				$tmp_file           = $_FILES['foto']['tmp_name'];
				
				// define the allowed extensions
				$allowed_extensions = array('jpg','jpeg','png');
				
				// Set the path of the folder where to save the image
				$path_file          = "../../images/user/".$nama_file;
				
				// check extension
				$file               = explode(".", $nama_file);
				$extension          = array_pop($file);

				// if password is not changed and photo is not changed
				if (empty($_POST['password']) && empty($_FILES['foto']['name'])) {
					// query command to change data in the users table
                    $query = mysqli_query($mysqli, "UPDATE users SET 	username 	= '$username',
                    													nama_user 	= '$nama_user',
																		nip			= '$nip',
                    													email       = '$email',
                    													hp     		= 'hp',
                    													hak_akses   = '$hak_akses'
                                                                  WHERE id_user 	= '$id_user'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // if successful display a successful data update message
                        header("location: ../../main.php?module=user&alert=2");
                    }
				}
				// if password is changed and photo is not changed
				elseif (!empty($_POST['password']) && empty($_FILES['foto']['name'])) {
					// query command to change data in the users table
                    $query = mysqli_query($mysqli, "UPDATE users SET   username 	= '$username',
                    													nama_user 	= '$nama_user',
																		nip			= '$nip',
                    													password 	= '$password',
                    													email       = '$email',
                    													hp		    = '$hp',
                    													hak_akses   = '$hak_akses'
                                                                  WHERE id_user 	= '$id_user'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // if successful display a successful data update message
                        header("location: ../../main.php?module=user&alert=2");
                    }
				}
				// if password is not changed and photo is changed
				elseif (empty($_POST['password']) && !empty($_FILES['foto']['name'])) {
					// Check if the uploaded file type matches allowed_extensions
					if (in_array($extension, $allowed_extensions)) {
	                    // If the uploaded file type matches the allowed_extensions, do :
	                    if($ukuran_file <= 1000000) { // Check if the uploaded file size is less than equal to 1MB
	                        // If the file size is less than equal to 1MB, do :
	                        // Process the upload
	                        if(move_uploaded_file($tmp_file, $path_file)) { // Check whether the image was uploaded successfully or not
                        		// If the image was uploaded successfully, perform : 
                        		// query command to change the data in the users table
			                    $query = mysqli_query($mysqli, "UPDATE users SET    username 	= '$username',
			                    													nama_user 	= '$nama_user',
																					nip			= '$nip',
			                    													email       = '$email',
			                    													hp		    = '$hp',
			                    													foto 		= '$nama_file',
			                    													hak_akses   = '$hak_akses'
			                                                                  WHERE id_user 	= '$id_user'")
			                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

			                    // cek query
			                    if ($query) {
			                        // if successful display a successful data update message
			                        header("location: ../../main.php?module=user&alert=2");
			                    }
                        	} else {
	                            // If the image fails to upload, display a failed upload message
	                            header("location: ../../main.php?module=user&alert=5");
	                        }
	                    } else {
	                        // If the file size is more than 1MB, display a failed upload message
	                        header("location: ../../main.php?module=user&alert=6");
	                    }
	                } else {
	                    // If the uploaded file type is not jpg, jpeg, png, display a failed upload message.
	                    header("location: ../../main.php?module=user&alert=7");
	                } 
				}
				// if password is changed and photo is changed
				else {
					// Check if the uploaded file type matches allowed_extensions
					if (in_array($extension, $allowed_extensions)) {
	                    // If the uploaded file type matches the allowed_extensions, do :
	                    if($ukuran_file <= 1000000) { // Check if the uploaded file size is less than equal to 1MB
	                        // If the file size is less than equal to 1MB, do :
	                        // Process the upload
	                        if(move_uploaded_file($tmp_file, $path_file)) { // Check whether the image was uploaded successfully or not
                        		// If the image was uploaded successfully, perform : 
                        		// query command to change the data in the users table
			                    $query = mysqli_query($mysqli, "UPDATE is_users SET username 	= '$username',
			                    													nama_user 	= '$nama_user',
																					nip			= '$nip',
			                    													password    = '$password',
			                    													email       = '$email',
			                    													hp		    = '$hp',
			                    													foto 		= '$nama_file',
			                    													hak_akses   = '$hak_akses'
			                                                                  WHERE id_user 	= '$id_user'")
			                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

			                    // cek query
			                    if ($query) {
			                        // if successful display a successful data update message
			                        header("location: ../../main.php?module=user&alert=2");
			                    }
                        	} else {
	                            // If the image fails to upload, display a failed upload message
	                            header("location: ../../main.php?module=user&alert=5");
	                        }
	                    } else {
	                        // If the file size is more than 1MB, display a failed upload message
	                        header("location: ../../main.php?module=user&alert=6");
	                    }
	                } else {
	                    // If the file size is more than 1MB, display a failed upload message
						// If the uploaded file type is not jpg, jpeg, png, display a failed upload message.
	                    header("location: ../../main.php?module=user&alert=7");
	                } 
				}
			}
		}
	}

	// update status to active
	elseif ($_GET['act']=='on') {
		if (isset($_GET['id'])) {
			// retrieve the submitted data from the form
			$id_user = $_GET['id'];
			$status  = "aktif";

			// query command to change data in the users table
            $query = mysqli_query($mysqli, "UPDATE users SET status  	= '$status'
                                                          WHERE id_user = '$id_user'")
                                            or die('Ada kesalahan pada query update status on : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
                // if successful display a successful data update message
                header("location: ../../main.php?module=user&alert=3");
            }
		}
	}

	// update status to block
	elseif ($_GET['act']=='off') {
		if (isset($_GET['id'])) {
			// retrieve the submitted data from the form
			$id_user = $_GET['id'];
			$status  = "blokir";

			// query command to change data in the users table
            $query = mysqli_query($mysqli, "UPDATE users SET status  	= '$status'
                                                          WHERE id_user = '$id_user'")
                                            or die('Ada kesalahan pada query update status on : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
                // if successful display a successful data update message
                header("location: ../../main.php?module=user&alert=4");
            }
		}
	}		
}		
?>