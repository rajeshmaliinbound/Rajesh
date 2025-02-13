<?php
$createArray1 = array("yellow", "pink", "orrange", "green");
$createArray2 = array("color1"=>"yellow", "color2"=>"pink", "color3"=>"orrange", "color4"=>"green");

echo "<pre>";
print_r($createArray2);

$test = array_change_key_case($createArray2, CASE_UPPER);
echo "<pre>";
print_r($test);

?>