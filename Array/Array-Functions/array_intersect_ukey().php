<?php
//return value acording to only key and provide a custome user define function 
function myfunction($a, $b)
{
    if($a===$b)
    {
        return 0;
    }

    if($a>$b)
    {
        return 1;
    }else{
        return -1;
    }
}

$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("a"=>"nocolor","d"=>"red","g"=>"green","h"=>"blue");

$result=array_intersect_ukey($a1,$a2,"myfunction");
echo "<pre>";
print_r($result);
?>