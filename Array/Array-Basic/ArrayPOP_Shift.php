<?php
// array_pop()   and  array_shift()

$pop= array("name"=>"Rajesh Kumar", "age"=>"22", "number"=>"8302803362");//array_pop()

array_pop($pop);
echo "<pre>";
print_r($pop);


$pop= array("name"=>"Rajesh Kumar", "age"=>"22", "number"=>"8302803362");//array_shift()
array_shift($pop);
echo "<pre>";
print_r($pop);

?>