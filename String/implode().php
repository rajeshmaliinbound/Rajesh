<?php
$array = array("Rajesh", "Ravi" ,"Karan", "Durgesh");
echo "<pre>";
print_r($array);

echo "<br>";

$str = implode(',' , $array); //use this function array to string covert..

echo "$str";

?>