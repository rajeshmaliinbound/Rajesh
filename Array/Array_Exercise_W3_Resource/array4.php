<?php
// OUTPUT
// array(5) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(4) [4]=> int(5) } 
// array(4) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(5) }

$x = array(1, 2, 3, 4, 5);

var_dump($x);
array_splice($x,3,1);
echo "<br>";
var_dump($x);
?>