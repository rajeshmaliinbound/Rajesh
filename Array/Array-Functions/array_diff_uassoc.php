<?php
function myfunction($x,$y)
{
   if($x===$y)
   {
    return 0 ;
   }

   if($x>$y)
   {
    return 1;
   }else{
    return -1;
   }

}

$array1 = array("name"=>"Rajesh ", "age"=>"22", "number"=>"8302803362", "gender"=>"male");
$array2 = array("name"=>"Ravi", "age"=>"22", "number"=>"7284018094", "gender"=>"male");

$result = array_diff_uassoc($array1,$array2, "myfunction");
echo "<pre>";
print_r($result);
?>