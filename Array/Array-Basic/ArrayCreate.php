<?php
//simple array Value assign
echo "Create Index Array";
$IndexArray = array('Rajesh', '22', '8302803362');// Create INDEX ARRAY 
echo "<pre>";
print_r($IndexArray); //Access Array



echo "<br> Create Associative Array";

$AssociativeArrays = array("name"=>"Rajesh Kumar", "age"=>"22", "number"=>"8302803362");//create Associative Array

echo "<pre>";
print_r($AssociativeArrays); //access associative Array values 

echo "<br>$AssociativeArrays[name]"; //access associative Array value using Key

?>