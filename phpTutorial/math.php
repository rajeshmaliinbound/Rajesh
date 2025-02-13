<?php

// get pi value 
$pivalue = pi() ;
echo $pivalue;

echo "<pre>";

// show minimum and maximum value 
$minimum = min(0,20,10,90,40,-4,4,);
$maximum = max(0,20,10,90,40,-4,4,);

echo $minimum; echo "<br>";
echo $maximum; echo "<br>";

// Return absulate value 
$positive = abs(-6.7) ;
echo $positive;echo "<br>";


//use for squer
$sqr = sqrt(6.40);
echo $sqr;echo "<br>";

//round() function rounds a floating-point number to its nearest integer:
$rnd = round(6.40);
echo $rnd;echo "<br>";

//use for generate random number
$rnd = rand(10,99);
echo $rnd;echo "<br>";
?>