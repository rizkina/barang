<html> 
    <!-- Part of the HTML page to print -->
<?php
session_start();
ob_start();
// Call database.php connection for database connection
require_once "../../config/database.php";
// call function for date format
include "../../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
include "../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");

$no = 1;
// query function to display data from the goods table
$query = mysqli_query($mysqli, "SELECT id_brg,nm_brg,satuan,stok FROM barang ORDER BY nm_brg ASC")
                                or die('Ada kesalahan pada query tampil Data Barang: '.mysqli_error($mysqli));
$count  = mysqli_num_rows($query);
?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>SIBS (stok)</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
        <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}
</style>
    </head>
    <body>
        <div id="title">
            LAPORAN STOK BARANG SEKOLAH
        </div>
        
        <hr><br>

        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">ID BARANG</th>
                        <th height="20" align="center" valign="middle">NAMA BARANG</th>
                        <th height="20" align="center" valign="middle">STOK</th>
                        <th height="20" align="center" valign="middle">CEK</th>
                        <th height="20" align="center" valign="middle">KET</th>
                    </tr>
                </thead>
                <tbody>
<?php
        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) {
            //$harga_beli = format_rupiah($data['harga_beli']);
            //$harga_jual = format_rupiah($data['harga_jual']);
            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                        <td width='40' height='13' align='center' valign='middle'>$no</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[id_brg]</td>
                        <td style='padding-left:5px;' width='180' height='13' valign='middle'>$data[nm_brg]</td>
                        <td style='padding-right:10px;' width='80' height='13' align='right' valign='middle'>$data[stok]</td>
                        <td width='80' height='13' align='center' valign='middle'></td>
                        <td width='80' height='13' align='center' valign='middle'></td>
                    </tr>";
            $no++;
        }
?>
                </tbody>
            </table>

            <div id="footer-tanggal">
                Kaliwungu, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div> 
            <div id="footer-jabatan">
                Kepala Sekolah
            </div>
            
            <div id="footer-nama">
                MUKIMIN, S.Pd
                <br>NIP. 19660303 199402 1 003</br>
            </div>
        </div>
        
        <script>
		window.print();
	    </script>

    </body>
</html>
<!-- End of HTML page to be printed -->