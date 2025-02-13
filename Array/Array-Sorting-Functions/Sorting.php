<?php //Array sorting  Ascending & Dscending order using => sort() & rsort() asort() arsort() ksort() krsort()

echo "<h3>1. sort() => sort array in Ascending order using numeric & Alpha value <h3>";
$array1 = array(4,45,98,36,9,45,34,65,35,66,355,22,76,33);
$array2 = array("splendra","R11", "hero","ZX10r", "Honda", "KTM", "MT15", "hondaSine");
sort($array1);
sort($array2);

echo "<pre>";
print_r($array1); //sort array in Ascending order using value 

echo "<pre>";
print_r($array2); //sort array in Ascending order using value  (starting Capital To small latter)




echo "<br><br><br><br><h3>2. rsort() => rsort array in Dscending order using numeric & Alpha value<h3>";
$array1 = array(4,45,98,36,9,45,34,65,35,66,355,22,76,33);
$array2 = array("splendra","R11", "hero","ZX10r", "Honda", "KTM", "MT15", "hondaSine");
rsort($array1);
rsort($array2);

echo "<pre>";
print_r($array1); //sort array in Dscending order using value(numeric)

echo "<pre>";
print_r($array2);  //sort array in Dscending order using value(Alpha)
 




 

echo "<br><br><br><br><h3>3. Array sorting associative Array Ascending & Dscending  ksort() krsort()<h3>";
$cars = array("car1"=>"BMW", "car2"=>"audi", "car3"=>"Tata","car4"=>"maruti", "car5"=>"ford", "car6"=>"scorepio",);
ksort($cars);
echo "<pre>";
print_r($cars); //sort array in Ascending Order According to Key - ksort()





$cars = array("car1"=>"BMW", "car2"=>"audi", "car3"=>"Tata","car4"=>"maruti", "car5"=>"ford", "car6"=>"scorepio",);
krsort($cars);
echo "<pre>";
print_r($cars); //sort array in Dscending Order According to Key - ksort()
?>
