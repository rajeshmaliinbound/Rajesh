<?php
$bike =  array("splendra", "Hero", "Honda", "KTM", "MT15", "Discover");

echo "<pre>";
print_r($bike);

unset($bike['3']); //unset/ remove array value from array with index key

echo "<pre>";
print_r($bike);
?>