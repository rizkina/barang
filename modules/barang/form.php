<!-- Sistem Informasi Barang Sekolah
*******************************************************
* Rizki NA
-->

 <?php  
// function to check the form display
// if the add data form is selected
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Barang
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=barang"> Barang </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/barang/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
              // function to create a transaction id
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_brg,6) as kode FROM barang
                                                ORDER BY id_brg DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_barang : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // retrieve Item ID data
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // create id_brg
              $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
              $id_brg = "A$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode barang</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_brg" value="<?php echo $id_brg; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Barang</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="id_jns" data-placeholder="-- Pilih --" autocomplete="off" required>
                    <option value=""></option>
                    <option value="Bahan Habis Pakai">Bahan Habis Pakai</option>
                    <option value="Uncategorize">Uncategorize</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Barang</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nm_brg" autocomplete="off" required>
                </div>
              </div>

              <!--div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Persediaan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="stok" autocomplete="off" required>
                </div>
              </div-->

              <div class="form-group">
                <label class="col-sm-2 control-label">Satuan</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="satuan" data-placeholder="-- Pilih --" autocomplete="off" required>
                    <option value=""></option>
                    <option value="pcs">pcs</option>
                    <option value="set">set</option>
                    <option value="liter">liter</option>
                    <option value="lbr">lbr</option>
                    <option value="rim">rim</option>
                    <option value="buah">buah</option>
                    <option value="pax">pax</option>
                    <option value="pasang">pasang</option>
                    <option value="Kg">Kg</option>
                    <option value="pill">pill</option>
                    <option value="box">box</option>
                  </select>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=barang" class="btn btn-default btn-reset">Batal</a>
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
// query function to display data from the goods table
      $query = mysqli_query($mysqli, "SELECT id_brg,id_jns,nm_brg,satuan FROM barang WHERE id_brg='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data Barang : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- display form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Barang
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=barang"> Barang </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/barang/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">ID Barang</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_brg" value="<?php echo $data['id_brg']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Barang</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="id_jns" data-placeholder="-- Pilih --" autocomplete="off" required>
                    <option value=""></option>
                    <option value="Bahan Habis Pakai">Bahan Habis Pakai</option>
                    <option value="Uncategorize">Uncategorize</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Barang</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nm_brg" autocomplete="off" value="<?php echo $data['nm_brg']; ?>" required>
                </div>
              </div>

              <!--div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Persediaan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="stok" autocomplete="off" required>
                </div>
              </div-->

              <div class="form-group">
                <label class="col-sm-2 control-label">Satuan</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="satuan" data-placeholder="-- Pilih --" autocomplete="off" required>
                    <option value=""></option>
                    <option value="pcs">pcs</option>
                    <option value="set">set</option>
                    <option value="liter">liter</option>
                    <option value="lbr">lbr</option>
                    <option value="rim">rim</option>
                    <option value="buah">buah</option>
                    <option value="pax">pax</option>
                    <option value="pasang">pasang</option>
                    <option value="Kg">Kg</option>
                    <option value="pill">pill</option>
                    <option value="box">box</option>
                  </select>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=barang" class="btn btn-default btn-reset">Batal</a>
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