<?php
$bike1 =  array("splendra", "Honda Hero", "Honda", "KTM", "MT15", "Discover");
$bike2 =  array("splendra", "Hero", "Honda", "KTM", "MT15", "Discover");

$new = array_diff($bike1,$bike2);
echo "<pre>";
print_r($new);

?>