<?php
$createArray1 = array("yellow", "pink", "orrange", "green"); //Index array
$createArray2 = array("color1"=>"yellow", "color2"=>"pink", "color3"=>"orrange", "color4"=>"green"); // Associative Array

$createArray3 = array(
                 array("yellow", "pink", "orrange", "green"),
                 array("color1"=>"yellow", "color2"=>"pink", "color3"=>"orrange", "color4"=>"green")

);

echo "Index Array <pre>";
print_r($createArray1);

echo "<br><br><br>Associative array<br><pre>";
print_r($createArray2);

echo "<br><br><br><br>multidimensional Array<br><br><pre>";
print_r($createArray3);
?>