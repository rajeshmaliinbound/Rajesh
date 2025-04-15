<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbName = 'inbound';

$conn = new mysqli($server,$username,$password,$dbName);

if($conn->connect_error){
    die("Connection Faild");
}
?>