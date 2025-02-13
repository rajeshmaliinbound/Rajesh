<?php
$CARS = array("Mahindra", "Tayota", "Maruti");

echo "<pre>";
print_r($CARS);

//First way to add multiple value in Array

$CARS += ["7"=>"Lemborghini", "8"=>"Bugati", "9"=> "Porche Spider"]; //Add multiple value

echo "<br><br><pre>";
print_r($CARS);


//Second way to add multiple value in Array

array_push($CARS , "AUDI", "BMW", "MUSTANG", "TATA"); //Add multiple value in Array using array_push() Function...

echo "<br><br><pre>";
print_r($CARS);



?>