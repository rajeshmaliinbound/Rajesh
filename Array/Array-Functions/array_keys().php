<?php
// retrive value in array    optional ( value strict )  print_r(array_keys($a,"10",false));
$array = [
    "a" => 1,
    "b" => 2,
    "c" => 3,
    "d" => 1
];

$keys = array_keys($array,1);
echo "<pre>";
print_r($keys);
?>