<?php
// 5*4*3*2*1
$num = 5;
$result=$num;

for($i=$num; $i>=1; $i--)
{

    if($i>1)
    {
        echo "$i*";
        $result = ($i-1)*$result; 

    }else{
        echo "$i";
    } 

}

echo " = $result";

?>