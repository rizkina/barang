<?php
session_start();
ob_start();

// Call database.php connection for database connection
require_once "../../config/database.php";
// call function for date format
include "../../config/fungsi_tanggal.php";


$hari_ini = date("d-m-Y");

// retrieve the submitted data from the form
$tgl1     = $_GET['tgl_awal'];
$explode  = explode('-',$tgl1);
$tgl_awal = $explode[2]."-".$explode[1]."-".$explode[0];

$tgl2      = $_GET['tgl_akhir'];
$explode   = explode('-',$tgl2);
$tgl_akhir = $explode[2]."-".$explode[1]."-".$explode[0];

if (isset($_GET['tgl_awal'])) {
    $no    = 1;
    // query function to display data from the outgoing goods table
    $query = mysqli_query($mysqli, "SELECT a.id_out,a.date_out,a.id_brg,a.jml_keluar,b.id_brg,b.nm_brg,b.satuan
                                    FROM barang_out as a INNER JOIN barang as b ON a.id_brg=b.id_brg
                                    WHERE a.date_out BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                    ORDER BY a.id_out ASC") 
                                    or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));
    $count  = mysqli_num_rows($query);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <!-- Part of the HTML page to convert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>SIBS | barang keluar</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
            LAPORAN DATA BARANG KELUAR 
        </div>
    <?php  
    if ($tgl_awal==$tgl_akhir) { ?>
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?>
        </div>
    <?php
    } else { ?>
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?> s.d. <?php echo tgl_eng_to_ind($tgl2); ?>
        </div>
    <?php
    }
    ?>
        
        <hr><br>
        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">KODE TRANSAKSI</th>
                        <th height="20" align="center" valign="middle">TANGGAL</th>
                        <th height="20" align="center" valign="middle">ID BARANG</th>
                        <th height="20" align="center" valign="middle">NAMA BARANG</th>
                        <th height="20" align="center" valign="middle">JUMLAH KELUAR</th>
                        <th height="20" align="center" valign="middle">SATUAN</th>
                    </tr>
                </thead>
                <tbody>
<?php
    // jika data ada
    if($count == 0) {
        echo "  <tr>
                    <td width='40' height='13' align='center' valign='middle'></td>
                    <td width='120' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td style='padding-left:5px;' width='155' height='13' valign='middle'></td>
                    <td style='padding-right:10px;' width='100' height='13' align='right' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                </tr>";
    }
    // if data doesn't exist
    else {
        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) {
            $tanggal       = $data['date_out'];
            $exp           = explode('-',$tanggal);
            $tanggal_keluar = $exp[2]."-".$exp[1]."-".$exp[0];

            // Display the table contents from the database to the table in the app
            echo "  <tr>
                        <td width='40' height='13' align='center' valign='middle'>$no</td>
                        <td width='120' height='13' align='center' valign='middle'>$data[id_out]</td>
                        <td width='80' height='13' align='center' valign='middle'>$tanggal_keluar</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[id_brg]</td>
                        <td style='padding-left:5px;' width='155' height='13' valign='middle'>$data[nm_brg]</td>
                        <td style='padding-right:10px;' width='100' height='13' align='right' valign='middle'>$data[jml_keluar]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[satuan]</td>
                    </tr>";
            $no++;
        }
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
                <br>NIP. 19660303 199402 1 003
            </div>
        </div>

        <!-- Script to Print Report -->
        <script>
		window.print();
	    </script>

    </body>
</html>
<!-- End of HTML page to be converted -->
