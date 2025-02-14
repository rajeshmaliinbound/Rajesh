<?php
$arrayValue = array("1", "2","3","4", "5");

foreach($arrayValue as $Value){
     echo "$Value ";
}

$newValue = '$';

array_splice($arrayValue, 3,0,$newValue);
echo "<br>";

foreach($arrayValue as $array)
{
    echo "$array ";
}


?>