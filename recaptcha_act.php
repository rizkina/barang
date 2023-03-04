<?php
$url = "https://www.google.com/recaptcha/api/siteverify";
$data = [
   'secret' => "6LffmbQkAAAAAISKjgfI-R6Zdxb1Muge8I-mMAqW",/*your secret key */
   'response' => $_POST['token'],
   'remoteip' => $_SERVER['REMOTE_ADDR']
];
$options = array(
   'http' => array(
   'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
   'method'  => 'POST',
   'content' => http_build_query($data)
   )
);
$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);
/*convert json */
$res = json_decode($response, true);
if ($res['success'] == 1 && $res['score'] >= 0.5) {
   $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
   $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
   echo "<p>Username : $nama</p>";
   //echo "<p>Kode Voucver : $kode_voucher</p>";
}else{
   echo "<p>Maaf, Terjadi kesalahan..</p>";
}
?>