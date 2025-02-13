<?php
$array1 = array("A"=>"Rajesh","B"=>"Kumar","C"=>"Mali");
$array2 = array("A"=>"35","B"=>"37","C"=>"43");
$array3 = array("Ravi","Ravi","karan");


echo "multiple array ko merge krta he (agar same key he to overwrite krega or jo last array ki value he usko show krega=> array_merge() )";
$newArray = array_merge($array1,$array2,$array3);

echo "<pre>";
print_r($newArray);

?>