<!-- Sistem Informasi Barang Sekolah
*******************************************************
* Rizki NA
-->
<?php  
/* call the database.php file to connect to the database */
require_once "config/database.php";

// query function to display data from the user table
$query = mysqli_query($mysqli, "SELECT id_user, nama_user, foto, hak_akses, lastvisited, lastlogout FROM users WHERE id_user='$_SESSION[id_user]'")
                                or die('Ada kesalahan pada query tampil Manajemen User: '.mysqli_error($mysqli));

// show data
$data = mysqli_fetch_assoc($query);
?>

<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <!-- User image -->

  <?php  
  if ($data['foto']=="") { ?>
    <img src="images/user/user-default.png" class="user-image" alt="User Image"/>
  <?php
  }
  else { ?>
    <img src="images/user/<?php echo $data['foto']; ?>" class="user-image" alt="User Image"/>
  <?php
  }
  ?>

    <span class="hidden-xs"><?php echo $data['nama_user']; ?> <i style="margin-left:5px" class="fa fa-angle-down"></i></span>
  </a>
  <ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header">

      <?php  
      if ($data['foto']=="") { ?>
        <img src="images/user/user-default.png" class="img-circle" alt="User Image"/>
      <?php
      }
      else { ?>
        <img src="images/user/<?php echo $data['foto']; ?>" class="img-circle" alt="User Image"/>
      <?php
      }
      ?>

      <p>
        <?php echo $data['nama_user']; ?>
        <small><?php echo $data['hak_akses']; ?></small>        
      </p>
    </li>
    <!--User body-->
    <li class="user-body">
      <p><small>Last visited : <?php echo $data['lastvisited']; ?></small></p>
      <p><small>Last logout  : <?php echo $data['lastlogout']; ?></small></p>
    </li>
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-left">
        <a style="width:80px" href="?module=profil" class="btn btn-default btn-flat">Profil</a>
      </div>

      <div class="pull-right">
        <a style="width:80px" data-toggle="modal" href="#logout" class="btn btn-default btn-flat">Logout</a>
      </div>
    </li>
  </ul>
</li>