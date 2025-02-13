<?php
$array1 = array("A"=>"Rajesh","B"=>"Kumar","C"=>"Mali");
$array2 = array("A"=>"35","B"=>"37","C"=>"43");
$array3 = array("Ravi","Ravi","karan");

echo "multiple array ko merge krta he esme agar 2 key same hoti he to all value ko show krega new array me";
$newArray = array_merge_recursive($array1,$array2,$array3);

echo "<pre>";
print_r($newArray);

?>