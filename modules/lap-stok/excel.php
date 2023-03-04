<?php
session_start();
ob_start();

// Call database.php connection for database connection
require_once "../../config/database.php";
// call function for date format
include "../../config/fungsi_tanggal.php";
// file name
$filename="Data Barang-".date('Ymd').".xls";

// header info for browser
header("Content-Type: application/vnd-ms-excel"); 
   header('Content-Disposition: attachment; filename="' . $filename . '";');



    // displays the data as an array from the product table
    $out=array();
    // query function to display data from the outgoing goods table
    $query = mysqli_query($mysqli, "SELECT id_brg,nm_brg,stok,satuan
                                    FROM barang
                                    ORDER BY id_brg ASC") 
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

