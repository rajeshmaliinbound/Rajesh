<?php

$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("e"=>"red","f"=>"yellow","g"=>"green","h"=>"blue");
$a3=array("h"=>"yellow","j"=>"green","k"=>"blue");
$a4=array("l"=>"red","m"=>"green","n"=>"black","o"=>"yellow");

$result=array_intersect($a1,$a2,$a3,$a4);
echo "<pre>";
print_r($result);
?>