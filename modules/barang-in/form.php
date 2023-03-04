<script type="text/javascript">
 
  function cek_jumlah_masuk(input) {
    jml = document.formBarangIn.jumlah_masuk.value;
    var jumlah = eval(jml);
    if(jumlah < 1){
      alert('Jumlah Masuk Tidak Boleh Nol !!');
      input.value = input.value.substring(0,input.value.length-1);
    }
  }

  function hitung_total_stok() {
    bil1 = document.formBarangIn.st.value;
    bil2 = document.formBarangIn.jumlah_masuk.value;

    if (bil2 == "") {
      var hasil = "";
    }
    else {
      var hasil = eval(bil1) + eval(bil2);
    }

    document.formBarangIn.total_stok.value = (hasil);
  }
</script>

<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Data Barang Masuk
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=barang_in"> Barang Masuk </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/barang-in/proses.php?act=insert" method="POST" name="formBarangIn">
            <div class="box-body">
              <?php  
              // function to create transaction code
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_in,7) as kode FROM barang_in
                                                ORDER BY id_in DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil kode_transaksi : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
              // retrieve transaction code data
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // create transaction_code
              $tahun          = date("Y");
              $buat_id        = str_pad($kode, 7, "0", STR_PAD_LEFT);
              $kode_transaksi = "TI-$tahun-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Transaksi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_transaksi" value="<?php echo $kode_transaksi; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_masuk" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                </div>
              </div>

              <hr>
              
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Barang</label>
                <div class="col-sm-5">
                  <?php
                    $result = mysqli_query($mysqli, "select * from barang");
                    $jsArray = "var prdName = new Array();\n";
                    echo '<select class="chosen-select" name="prdId" onchange="changeValue(this.value)" data-placeholder="-- Pilih barang --" autocomplete="off" required>';
                    echo '<option value=""></option>';
                    while ($row = mysqli_fetch_array($result)) {
                      echo '<option value="' . $row['id_brg'] . '">' . $row['id_brg'] . ' | '. $row['nm_brg'].' </option>';
                      $jsArray .= "prdName['" . $row['id_brg'] . "'] = {satu:'" . addslashes($row['satuan']) . "',setok:'".addslashes($row['stok'])."'};\n";
                    }
                    echo '</select>';
                  ?>
                  <script type="text/javascript">
                    <?php echo $jsArray; ?>
                    function changeValue(id){
                      document.getElementById('sat').textContent = prdName[id].satu;
                      document.getElementById('st').value = prdName[id].setok;
                    };
                  </script>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Stok</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <input type="tex" class="form-control" id="st" name="st"  readonly>
                    <span class="input-group-addon" id="sat"></span>
                  </div>
                </div>
              </div>
              <!--end-->


              
              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Masuk</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="jumlah_masuk" name="jumlah_masuk" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="hitung_total_stok(this)&cek_jumlah_masuk(this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Total Stok</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="total_stok" name="total_stok" readonly required>
                </div>
              </div>

              <!--div class="form-group">
                <label class="col-sm-2 control-label">Ruang</label>
                <div class="col-sm-5">
                  <?php
                    $hasil = mysqli_query($mysqli, "select * from ruang");
                    echo '<select class="chosen-select" name="ruangId" onchange="changeValue(this.value)" data-placeholder="-- Pilih Ruang --" autocomplete="off" required>';
                    echo '<option value=""></option>';
                    while ($baris = mysqli_fetch_array($hasil)) {
                      echo '<option value="' . $baris['id_ruang'] . '">' . $baris['id_ruang'] . ' | '. $baris['nm_ruang'].' </option>';
                    }
                    echo '</select>';
                  ?>
                </div>
              </div-->


            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=barang_in" class="btn btn-default btn-reset">Batal</a>
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