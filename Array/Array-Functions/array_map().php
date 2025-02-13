<?php
//Double Value in Array

function double($x)
{
    return $x*2;
}

$array1 = array("1"=>"A", "3"=>"B", "3"=>"C", "4"=>"D", "5"=>"E", "6"=>"F");
$array2 = array_flip($array1);

echo "<pre>";
print_r($array2);


$array3 = array_map("double",$array2);

echo "<pre>";
print_r($array3);
?>