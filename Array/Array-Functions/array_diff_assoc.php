<?php

$a1=array("a"=>"red","b"=>"green","e"=>"blue","c"=>"yellow");
$a2=array("a"=>"red","b"=>"green","c"=>"blue");

$result=array_diff_assoc($a1,$a2);

echo "<pre>";
print_r($result);

?>