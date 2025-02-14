<?php
$array1 = array(array(77, 87), array(23, 45));
$array2 = array("w3resource", "com");

// Merging the arrays by index
$mergedArray = array_map(function($a, $b) {

    return array_merge($a, array($b));  // Merge the sub-array with string
}, $array1, $array2);

print_r($mergedArray);
?>
