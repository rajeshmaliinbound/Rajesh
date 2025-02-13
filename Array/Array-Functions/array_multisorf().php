<?php
//return a sorted array in ascending order (single array) 

$a=array("Dog","Cat","Horse","Bear","Zebra");
echo "return a sorted array in ascending order using array_multisort() function;";
echo "<pre>";
array_multisort($a);
print_r($a);

//return a sorted array in ascending order (Multiple array) 
$a1=array("Ravi","Rajesh");
$a2=array("Karan","Durgesh");
array_multisort($a1,$a2);
echo "<pre>";
print_r($a1);

echo "<pre><br<br>";
print_r($a2);



//Return sorts in ascending order value when Two value are same.(Without Parameter)
echo "<br><br> Return a sorts in ascending order value when Two value are same.";
$a1=array("Dog","Dog","Cat");
$a2=array("Pluto","Fido","Missy");
array_multisort($a1,$a2);

echo "<pre>";
print_r($a1);
print_r($a2);


//Return sorts in ascending order value when Two value are same()
echo "<br><br>Using sorting parameters";

$a1=array("Dog","Dog","Cat");
$a2=array("Pluto","Fido","Missy");
array_multisort($a1,SORT_ASC,$a2,SORT_DESC);//Using parameter( SORT_ASC  , SORT_DESC ) 
echo "<pre>";
print_r($a1);
print_r($a2);

?>