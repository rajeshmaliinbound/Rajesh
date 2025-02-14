<?php

 $vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");

 echo "<pre>";
print_r($vowels);

echo "<br>";


 $onlyconsonants = str_replace($vowels, "-", "Hello World of PHP");

echo "$onlyconsonants";
?>
