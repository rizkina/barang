<!-- Sistem Informasi Barang Sekolah
*******************************************************
* Rizki NA
-->

<?php
// call file for connection to database
require_once "config/database.php";

// retrieve submit result data from form
$username = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = md5(mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));

// Make sure the username and password are letters or numbers.
if (!ctype_alnum($username) OR !ctype_alnum($password)) {
	header("Location: index.php?alert=1");
}
else {
// retrieve data from the user table to check based on username and passrword inputs.
	$query = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username' AND password='$password' AND status='aktif'")
									or die('Ada kesalahan pada query user: '.mysqli_error($mysqli));
	$rows  = mysqli_num_rows($query);

// if the data exists, run the command to create a session
	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['id_user']   = $data['id_user'];
		$_SESSION['username']  = $data['username'];
		$_SESSION['password']  = $data['password'];
		$_SESSION['nama_user'] = $data['nama_user'];
		$_SESSION['nip'] = $data['nip'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['hp'] = $data['hp'];
		$_SESSION['hak_akses'] = $data['hak_akses'];
		$_SESSION['status'] = $data['status'];
		$_SESSION['create_at'] = $data['create_at'];
		$_SESSION['lastvisited'] = $data['lastvisited'];
		$_SESSION['lastlogout'] = $data['lastlogout'];

		
// then switch to the user page
		header("Location: main.php?module=beranda");
	}

// if data does not exist, redirect to the login page and display message = 1
	else {
		header("Location: index.php?alert=1");
	}
}
?>