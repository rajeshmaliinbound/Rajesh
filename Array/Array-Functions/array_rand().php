<?php
$bike1 =  array("splendra", "R11", "Honda", "KTM", "MT15");

echo "<pre>";
$newArray =array_rand($bike1,3);

echo $bike1[$newArray[0]]."<br>";
echo $bike1[$newArray[1]]."<br>";
echo $bike1[$newArray[2]];  
?>