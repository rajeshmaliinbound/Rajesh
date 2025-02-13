<?php
$bike =  array("splendra", "Hero", "Honda", "KTM", "MT15", "Discover");

echo "<pre>";
print_r($bike);

array_splice($bike, 3, 2);

echo "<pre>";
print_r($bike);


$cars = array("car1"=>"splendra", "car2"=>"Hero", "car3"=>"KTM","car4"=>"maruti", "car5"=>"ford", "car6"=>"scorepio",);
echo "<pre>";
print_r($cars);

array_splice($cars, "1", 2); //same splice array in associative array
echo "<pre>";
print_r($cars);
?>