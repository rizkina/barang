<!-- Sistem Informasi Barang Sekolah
*******************************************************
* Rizki NA
-->

 <?php  
// function to check the form display
// if the add data form is selected
if ($_GET['form']=='add') { ?> 
  <!-- add data form display -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Ruang
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=ruang"> Ruang </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/ruang/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
              // function to create a transaction id
              $query_id = mysqli_query($mysqli, "SELECT id_ruang as kode FROM ruang
                                                ORDER BY id_ruang DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_ruang : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // retrieve room ID data
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // reate id_ruang
              $buat_id   = str_pad($kode, 4, "0", STR_PAD_LEFT);
              $id_ruang = "$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode ruang</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_ruang" value="<?php echo $id_ruang; ?>" readonly required>
                </div>
              </div>
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Ruang</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nm_ruang" autocomplete="off" required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=ruang" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
// if the edit data form is selected
// isset: check data exists / not
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel obat
      $query = mysqli_query($mysqli, "SELECT id_ruang,nm_ruang FROM ruang WHERE id_ruang='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data Ruang : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- data edit form display -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Ruang
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=ruang"> Ruang </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/ruang/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">ID Ruang</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_ruang" value="<?php echo $data['id_ruang']; ?>" readonly required>
                </div>
              </div>
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Ruang</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nm_ruang" autocomplete="off" value="<?php echo $data['nm_ruang']; ?>" required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=ruang" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>