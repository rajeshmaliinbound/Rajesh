<?php
$createArray2 = array("color1"=>"yellow", "color2"=>"pink", "color3"=>"orrange", "color4"=>"green",
                      "color5"=>"yellow", "color6"=>"pink", "color7"=>"orrange", "color8"=>"green");

echo "<pre>";
print_r($createArray2); 

$test = array_chunk($createArray2,4,true);
echo "<pre>";
print_r($test);
?>