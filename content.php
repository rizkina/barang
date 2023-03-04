<!-- Sistem Informasi Barang Sekolah
*******************************************************
* Rizki NA
-->
<?php
/* call the database.php file to connect to the database */
require_once "config/database.php";
/* call additional function files */
//require_once "config/fungsi_tanggal.php";
//require_once "config/fungsi_rupiah.php";

// function to check user login status 
// if the user is not logged in, redirect to the login page and display message = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// If the user is logged in, then run the command to call the content page file
else {
// if the selected content page is the beranda, call the beranda view file
	if ($_GET['module'] == 'beranda') {
		include "modules/beranda/view.php";
	}

// if the selected content page is barang, call the barang view file
	elseif ($_GET['module'] == 'barang') {
		include "modules/barang/view.php";
	}

// if the content page is selected barang form, call the barang form file
	elseif ($_GET['module'] == 'form_barang') {
		include "modules/barang/form.php";
	}
	// -----------------------------------------------------------------------------

	// if the selected content page is ruang, call the ruang view file
	elseif ($_GET['module'] == 'ruang') {
		include "modules/ruang/view.php";
	}

// If the selected content page is a ruang form, call the ruang form file
	elseif ($_GET['module'] == 'form_ruang') {
		include "modules/ruang/form.php";
	}
	// -----------------------------------------------------------------------------
// if the selected content page is incoming goods, call the view  barang_in file
	elseif ($_GET['module'] == 'barang_in') {
		include "modules/barang-in/view.php";
	}

// If the selected content page is the incoming goods form, call the barang_in form file
	elseif ($_GET['module'] == 'form_barang_in') {
		include "modules/barang-in/form.php";
	}
	// -----------------------------------------------------------------------------

// if the selected content page is outgoing goods, call the  barang_out view file
	elseif ($_GET['module'] == 'barang_out') {
		include "modules/barang-out/view.php";
	}

// If the content page selected is the outgoing goods form, call the barang_out form file
	elseif ($_GET['module'] == 'form_barang_out') {
		include "modules/barang-out/form.php";
	}
	// -----------------------------------------------------------------------------

// if the content page selected is stock report, call the stock report view file
	elseif ($_GET['module'] == 'lap_stok') {
		include "modules/lap-stok/view.php";
	}
	// -----------------------------------------------------------------------------

// If the selected content page is incoming goods report, call the view incoming goods report file
	elseif ($_GET['module'] == 'lap_barang_in') {
		include "modules/lap-barang-in/view.php";
	}
	// -----------------------------------------------------------------------------

// If the selected content page is the outgoing goods report, call the outgoing goods report view file
	elseif ($_GET['module'] == 'lap_barang_out') {
		include "modules/lap-barang-out/view.php";
	}
	// -----------------------------------------------------------------------------

// If the content page is selected by the user, call the user view file
	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}

// If the selected content page is user form, call the user form file
	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}
	// -----------------------------------------------------------------------------

// if the selected content page is profile, call the view profile file
	elseif ($_GET['module'] == 'profil') {
		include "modules/profil/view.php";
	}

// if the selected content page is profile form, call the profile form file
	elseif ($_GET['module'] == 'form_profil') {
		include "modules/profil/form.php";
	}
	// -----------------------------------------------------------------------------
	
// If the selected content page is passworded, call the view password file
	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}
}
?>