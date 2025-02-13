<?php
//common value return according to key
$a1=array("1"=>"red","a"=>"green","3"=>"blue","d"=>"yellow");
$a2=array("1"=>"red","d"=>"yellow","a"=>"green","c"=>"blue");
$a3=array("1"=>"red","a"=>"green","k"=>"blue","d"=>"yellow");
$a4=array("1"=>"red","a"=>"green","n"=>"black","d"=>"yellow");

$result=array_intersect_assoc($a1,$a2,$a3,$a4);
echo "<pre>";
print_r($result);
?>