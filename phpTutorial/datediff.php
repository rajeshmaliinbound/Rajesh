<?php

$date1 = new DateTime("2002-07-18");
$date2 = new DateTime("2025-02-04");

$diff = $date1->diff($date2);

// print_r($diff);

echo "Difference: " .$diff->format('%y years-%m months-%d days');


?>
