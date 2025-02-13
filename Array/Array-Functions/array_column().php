<?php
$createArray3 = array(
    array("name"=>"Ravi Kumar", "age"=>"22", "number"=>"7937645972", "gender"=>"Male"),
    array("name"=>"Durgesh Kumar", "age"=>"21", "number"=>"830203362", "gender"=>"Male"),
    array("name"=>"Karan Kumar", "age"=>"21", "number"=>"09876543", "gender"=>"Male"),
    array("name"=>"Rajesh Kumar", "age"=>"21", "number"=>"2345678", "gender"=>"Male"),
    array("name"=>"khushal Kumar", "age"=>"21", "number"=>"83876542", "gender"=>"Male")
);

$test = array_column($createArray3, 'name','number');
echo "<pre>";
print_r($test);

echo "<pre>";
print_r($createArray3);


?>