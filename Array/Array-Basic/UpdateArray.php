<?php
//simple array Value assign

$AssociativeArrays = array("name"=>"Rajesh Kumar", "age"=>"22", "number"=>"8302803362");//create Associative Array

echo "<pre>";
print_r($AssociativeArrays); //access associative Array values 

$AssociativeArrays['name'] =  "Ravi Mali " ;  //UPDATE VALUE of array

echo "<br>$AssociativeArrays[name] <br><br>"; //access associative Array value using Key

print_r($AssociativeArrays);//UPDATE all Array value 

?>