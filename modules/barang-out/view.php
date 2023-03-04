<!-- Sistem Informasi Barang Sekolah
*******************************************************
* Rizki NA
-->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-sign-out icon-title"></i> Data Barang Keluar

    <a class="btn btn-primary btn-social pull-right" href="?module=form_barang_out&form=add" title="Tambah Data" data-toggle="tooltip">
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
    // show Success message "Data barang keluar berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data barang Keluar berhasil disimpan.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tabel barang view -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tabel header view  -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Kode Transaksi</th>
                <th class="center">Tanggal</th>
                <th class="center">Kode barang</th>
                <th class="center">Nama barang</th>
                <th class="center">Jumlah Keluar</th>
                <th class="center">Satuan</th>
              </tr>
            </thead>
            <!-- tabel body view -->
            <tbody>
            <?php  
            $no = 1;
            // query function to display data from the goods table
            $query = mysqli_query($mysqli, "SELECT a.id_out,a.date_out,a.id_brg,a.jml_keluar,b.id_brg,b.nm_brg,b.satuan
                                            FROM barang_out as a INNER JOIN barang as b ON a.id_brg=b.id_brg ORDER BY id_out DESC")
                                            or die('Ada kesalahan pada query tampil Data Barang Keluar: '.mysqli_error($mysqli));

            // data view
            while ($data = mysqli_fetch_assoc($query)) { 
              $tanggal         = $data['date_out'];
              $exp             = explode('-',$tanggal);
              $tanggal_keluar   = $exp[2]."-".$exp[1]."-".$exp[0];

              // Display the table contents from the database to the table in the app
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='100' class='center'>$data[id_out]</td>
                      <td width='80' class='center'>$tanggal_keluar</td>
                      <td width='80' class='center'>$data[id_brg]</td>
                      <td width='200'>$data[nm_brg]</td>
                      <td width='100' align='right'>$data[jml_keluar]</td>
                      <td width='80' class='center'>$data[satuan]</td>
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