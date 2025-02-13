<?php
$array1 = array("0","1","2","Durgesh","Hitesh","Khushal");

echo "<pre>";
print_r($array1);

$result = array_filter($array1);

echo "<pre>";
print_r($result);
?>