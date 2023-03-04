<?php
session_start();
ob_start();

// Call database.php connection for database connection
require_once "../../config/database.php";
// call function for date format
include "../../config/fungsi_tanggal.php";
// file name
$filename="Barang Keluar-".date('Ymd').".xls";

// header info for browser
header("Content-Type: application/vnd-ms-excel"); 
   header('Content-Disposition: attachment; filename="' . $filename . '";');



    // displays the data as an array from the product table
    $out=array();
    // query function to display data from the outgoing goods table
    $query = mysqli_query($mysqli, "SELECT a.id_out,a.date_out,a.id_brg,a.jml_keluar,b.id_brg,b.nm_brg,b.satuan
                                    FROM barang_out as a INNER JOIN barang as b ON a.id_brg=b.id_brg
                                    ORDER BY a.id_out ASC") 
                                    or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));
    $count  = mysqli_num_rows($query);

    while($data=mysqli_fetch_assoc($query)) $out[]=$data;

    $show_coloumn = false;
    foreach($out as $record) {
    if(!$show_coloumn) {
    // displays the column name in the first row
    echo implode("\t", array_keys($record)) . "\n";
    $show_coloumn = true;
    }
    // looping data from the database
    echo implode("\t", array_values($record)) . "\n";
    } 
    exit;


?>

