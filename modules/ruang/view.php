<!-- Sistem Informasi Barang Sekolah
*******************************************************
* Rizki NA
-->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Data Ruang

    <a class="btn btn-primary btn-social pull-right" href="?module=form_ruang&form=add" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  
    // function to display the message
    // if alert = "" (empty)
    // show message "" (empty)
    if (empty($_GET['alert'])) {
      echo "";
    } 
    // if alert = 1
    // show Success message "Data ruang baru berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data ruang baru berhasil disimpan.
            </div>";
    }
    // if alert = 2
    // show Success message "Data ruang berhasil diubah"
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data ruang berhasil diubah.
            </div>";
    }
    // if alert = 3
    // show Success message "Data ruang berhasil dihapus"
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data ruang berhasil dihapus.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tabel ruang view -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">ID Ruang</th>
                <th class="center">Nama Ruang</th>
                <th></th>
              </tr>
            </thead>
            <!-- tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // query function to display data from the medicine table
            $query = mysqli_query($mysqli, "SELECT id_ruang,nm_ruang FROM ruang ORDER BY id_ruang DESC")
                                            or die('Ada kesalahan pada query tampil Data Ruang: '.mysqli_error($mysqli));

            // data view
            while ($data = mysqli_fetch_assoc($query)) { 
              // Display the table contents from the database to the table in the app
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[id_ruang]</td>
                      <td width='180'>$data[nm_ruang]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_ruang&form=edit&id=$data[id_ruang]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/ruang/proses.php?act=delete&id=<?php echo $data['id_ruang'];?>" onclick="return confirm('Anda yakin ingin menghapus barang <?php echo $data['nm_ruang']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php
              echo "    </div>
                      </td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content