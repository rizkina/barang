<?php 
// level check function to display menu according to access rights
// if access rights = Super Admin, display the menu
if ($_SESSION['hak_akses']=='Super Admin') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
// function for checking the active menu
	// if the home menu is selected, the home menu is active
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
// Otherwise, the home menu is not active
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
  	
// If the Item reference data menu is selected, the Item data menu is active
  if ($_GET["module"]=="barang" || $_GET["module"]=="form_barang") { ?>
    <li class="active treeview">
      <a href="javascript:void(0);">
        <i class="fa fa-folder"></i> <span>Referensi Data</span> <i class="fa fa-angle-down pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li class="active"><a href="?module=barang"><i class="fa fa-circle-o"></i> Data Barang </a></li>
        <li><a href="?module=ruang"><i class="fa fa-circle-o"></i> Data Ruang </a></li>
      </ul> 
    </li>
  <?php
  }
// If the room reference data menu is selected, the room data menu is active
  elseif ($_GET["module"]=="ruang" || $_GET["module"]=="form_ruang") { ?>
    <li class="active treeview">
      <a href="javascript:void(0);">
        <i class="fa fa-folder"></i> <span>Referensi Data</span> <i class="fa fa-angle-down pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="?module=barang"><i class="fa fa-circle-o"></i> Data Barang </a></li>
        <li class="active"><a href="?module=ruang"><i class="fa fa-circle-o"></i> Data Ruang </a></li>
      </ul> 
    </li>
  <?php
  }
  // jika tidak, menu data referensi tidak aktif
  else { ?>
    <li class="treeview">
      <a href="javascript:void(0);">
        <i class="fa fa-folder"></i> <span>Referensi Data</span> <i class="fa fa-angle-down pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="?module=barang"><i class="fa fa-circle-o"></i> Data Barang </a></li>
        <li><a href="?module=ruang"><i class="fa fa-circle-o"></i> Data Ruang </a></li>
      </ul>
    </li>
  <?php
  }

  // jika menu data Barang masuk dipilih, menu data Barang masuk aktif
  if ($_GET["module"]=="barang_in" || $_GET["module"]=="form_barang_in") { ?>
    <li class="active">
      <a href="?module=barang_in"><i class="fa fa-clone"></i> Data Barang Masuk </a>
      </li>
  <?php
  }
  // jika tidak, menu data Barang masuk tidak aktif
  else { ?>
    <li>
      <a href="?module=barang_in"><i class="fa fa-clone"></i> Data Barang Masuk </a>
      </li>
  <?php
  }

  // jika menu data Barang keluar dipilih, menu data Barang keluar aktif
  if ($_GET["module"]=="barang_out" || $_GET["module"]=="form_barang_out") { ?>
    <li class="active">
      <a href="?module=barang_out"><i class="fa fa-clone"></i> Data Barang Keluar </a>
      </li>
  <?php
  }
  // jika tidak, menu data Barang keluar tidak aktif
  else { ?>
    <li>
      <a href="?module=barang_out"><i class="fa fa-clone"></i> Data Barang Keluar </a>
      </li>
  <?php
  }

	// jika menu Laporan Stok Barang dipilih, menu Laporan Stok Barang aktif
	if ($_GET["module"]=="lap_stok") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
        		<li><a href="?module=lap_barang_in"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_barang_out"><i class="fa fa-circle-o"></i> Barang Keluar </a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Laporan Barang Masuk dipilih, menu Laporan Barang Masuk aktif
	elseif ($_GET["module"]=="lap_barang_in") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
        		<li class="active"><a href="?module=lap_barang_in"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_barang_out"><i class="fa fa-circle-o"></i> Barang Barang </a></li>
      		</ul>
    	</li>
    <?php
  }
  // jika menu Laporan Barang Keluar dipilih, menu Laporan Barang Keluar aktif
	elseif ($_GET["module"]=="lap_barang_out") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang</a></li>
            <li><a href="?module=lap_barang_in"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li class="active"><a href="?module=lap_barang_out"><i class="fa fa-circle-o"></i> Barang Keluar </a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Laporan tidak dipilih, menu Laporan tidak aktif
	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
        		<li><a href="?module=lap_barang_in"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_barang_out"><i class="fa fa-circle-o"></i> Barang Keluar </a></li>
      		</ul>
    	</li>
    <?php
	}

	// jika menu user dipilih, menu user aktif
	if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
		<li class="active">
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}
	// jika tidak, menu user tidak aktif
	else { ?>
		<li>
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}

	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
//Access Rights
// if access rights = Pimpinan, display the menu
elseif ($_SESSION['hak_akses']=='Pimpinan') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
// function for checking the active menu
	// if the home menu is selected, the home menu is active
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu beranda tidak aktif
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

   // jika menu data Barang keluar dipilih, menu data Barang keluar aktif
   if ($_GET["module"]=="barang_out" || $_GET["module"]=="form_barang_out") { ?>
    <li class="active">
      <a href="?module=barang_out"><i class="fa fa-clone"></i> Data Barang Keluar </a>
      </li>
  <?php
  }
  // jika tidak, menu data Barang keluar tidak aktif
  else { ?>
    <li>
      <a href="?module=barang_out"><i class="fa fa-clone"></i> Data Barang Keluar </a>
      </li>
  <?php
  }

	// jika menu Laporan Stok Barang dipilih, menu Laporan Stok Barang aktif
  if ($_GET["module"]=="lap_stok") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
            <li><a href="?module=lap_barang_in"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan Barang Masuk dipilih, menu Laporan Barang Masuk aktif
  elseif ($_GET["module"]=="lap_barang_in") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
            <li class="active"><a href="?module=lap_barang_in"><i class="fa fa-circle-o"></i> Barang Barang </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
            <li><a href="?module=lap_barang_in"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
          </ul>
      </li>
    <?php
  }

// if password change menu is selected, password change menu is active
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
//Access Rights
// if access rights = Inventory Officer, display the menu
if ($_SESSION['hak_akses']=='Petugas Inventaris') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// function for checking the active menu
	// if the home menu is selected, the home menu is active
  if ($_GET["module"]=="beranda") { ?>
    <li class="active">
      <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
      </li>
  <?php
  }
// Otherwise, the home menu is not active
  else { ?>
    <li>
      <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
      </li>
  <?php
  }

// If the Item data menu is selected, the Item data menu is active
  if ($_GET["module"]=="barang" || $_GET["module"]=="form_barang") { ?>
    <li class="active">
      <a href="?module=barang"><i class="fa fa-folder"></i> Data Barang</a>
      </li>
  <?php
  }
// Otherwise, the Goods data menu is not active
  else { ?>
    <li>
      <a href="?module=barang"><i class="fa fa-folder"></i> Data Barang</a>
      </li>
  <?php
  }

  // If the Goods-in data menu is selected, the Goods-in data menu is active
  if ($_GET["module"]=="barang_in" || $_GET["module"]=="form_barang_in") { ?>
    <li class="active">
      <a href="?module=barang_in"><i class="fa fa-clone"></i> Data Barang Masuk </a>
      </li>
  <?php
  }
  // Otherwise, the Goods-in data menu is inactive
  else { ?>
    <li>
      <a href="?module=barang_in"><i class="fa fa-clone"></i> Data Barang Masuk </a>
      </li>
  <?php
  }

   // If the Outgoing goods data menu is selected, the Outgoing goods data menu is active
   if ($_GET["module"]=="barang_out" || $_GET["module"]=="form_barang_out") { ?>
    <li class="active">
      <a href="?module=barang_out"><i class="fa fa-clone"></i> Data Barang Keluar </a>
      </li>
  <?php
  }
  // jika tidak, menu data Barang keluar tidak aktif
  else { ?>
    <li>
      <a href="?module=barang_out"><i class="fa fa-clone"></i> Data Barang Keluar </a>
      </li>
  <?php
  }

  // jika menu Laporan Stok Barang dipilih, menu Laporan Stok Barang aktif
  if ($_GET["module"]=="lap_stok") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
            <li><a href="?module=lap_barang_in"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
          </ul>
      </li>
    <?php
  }
// if the Incoming Goods Report menu is selected, the Incoming Goods Report menu is active
  elseif ($_GET["module"]=="lap_barang_in") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
            <li class="active"><a href="?module=lap_barang_in"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
          </ul>
      </li>
    <?php
  }
// if the Reports menu is not selected, the Reports menu is inactive
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
            <li><a href="?module=lap_barang_in"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
          </ul>
      </li>
    <?php
  }

	// if password change menu is selected, password change menu is active
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
// Otherwise, the password change menu is inactive
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
?>