<?php
$data = "rajesh";
$key = "AES-256-CBC";
$password = "MYpassword"; 

$pass = password_hash($password);
echo $pass;

//Data encript 
$iv = openssl_random_pseudo_bytes(16);  // 16-byte random IV
$encryptedData = openssl_encrypt($data, 'AES-256-CBC', $password, 0, $iv);
echo $encryptedData; echo "<br><br>";


//encript data recover in real format
$Data = openssl_decrypt($encryptedData, 'AES-256-CBC', $password, 0, $iv);
echo $Data;
?>