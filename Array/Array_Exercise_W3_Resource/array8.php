<?php
$value = array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40");

print_r($value);

// ascending order sort by value
echo "<br><br><br><br>ascending order sort by value :&nbsp&nbsp ";
asort($value);
print_r($value);


// ascending order sort by value
echo "<br><br><br><br>ascending order sort by Key : &nbsp&nbsp ";
ksort($value);
print_r($value);

// ascending order sort by value
echo "<br><br><br><br>descending order sorting by Value :&nbsp&nbsp ";
arsort($value);
print_r($value);

// ascending order sort by value
echo "<br><br><br><br>desending order sorting by key :&nbsp&nbsp " ;
krsort($value);
print_r($value);

?>