<?php
 function myfunction($value , $key)
 {
   echo "<br>$key : $value <br>";
 }

$jsonCode = '{"Title": "The Cuckoos Calling",
    "Author": "Robert Galbraith",
    "Detail": {
    "Publisher": "Little Brown"
    }
}';

$decode = json_decode($jsonCode, true);
 
echo "<pre>";
print_r($decode);
$new = array_walk_recursive($decode, "myfunction");
?>