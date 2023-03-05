<!-- Sistem Informasi Barang Sekolah
*******************************************************
* Rizki NA
-->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Data Barang

    <a class="btn btn-primary btn-social pull-right" href="?module=form_barang&form=add" title="Tambah Data" data-toggle="tooltip">
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
    // show Success message "New item data saved successfully"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data barang baru berhasil disimpan.
            </div>";
    }
    // if alert = 2
    // display the Success message "Item data changed successfully"
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data barang berhasil diubah.
            </div>";
    }
   // if alert = 3
    // display the Success message "Item data successfully deleted"
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data barang berhasil dihapus.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- item table view -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tabel header view-->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">ID Barang</th>
                <th class="center">Jenis Barang</th>
                <th class="center">Nama Barang</th>
                <th class="center">Jumlah Persediaan</th>
                <th class="center">Satuan</th>
                <th></th>
              </tr>
            </thead>
            <!-- tabel body view -->
            <tbody>
            <?php  
            $no = 1;
            // query function to display data from the barang table
            $query = mysqli_query($mysqli, "SELECT id_brg,id_jns,nm_brg,stok,satuan FROM barang ORDER BY id_brg DESC")
                                            or die('Ada kesalahan pada query tampil Data Barang: '.mysqli_error($mysqli));

            // perform data
            while ($data = mysqli_fetch_assoc($query)) { 
              // perform database into table
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[id_brg]</td>
                      <td width='80' align='right'>$data[id_jns]</td>
                      <td width='180'>$data[nm_brg]</td>
                      <td width='80' class='center'>$data[stok]</td>
                      <td width='80' class='center'>$data[satuan]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_barang&form=edit&id=$data[id_brg]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/barang/proses.php?act=delete&id=<?php echo $data['id_brg'];?>" onclick="return confirm('Anda yakin ingin menghapus barang <?php echo $data['nm_brg']; ?> ?');">
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
