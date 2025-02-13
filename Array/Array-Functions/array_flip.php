<?php
//swape value key to value & value to key
$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");

$result=array_flip($a1);

echo "<pre>";
print_r($result);

$result=array_flip($result);
echo "<br><pre>";
print_r($result);
?>