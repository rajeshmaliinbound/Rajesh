<?php
class Demo{

    public function hello($x){

       echo $x;
       echo "<br>";

    }
    
}

$x = 5;
var_dump($x);   # intiger
echo "<br>";  

$x = "hello Rajesh";
var_dump($x);   # string
echo "<br>";


$x = "0906.2143";
var_dump($x);  # Floate
echo "<br>";


$x = [2,3,5];
var_dump($x);  # array
echo "<br>";


$x = true;
var_dump($x); # boolean
echo "<br>";


$x = new Demo($x);
$x->hello("Rajesh");      
var_dump($x);     # object
echo "<br>";

 
$x = NULL;
var_dump($x);     # NULL
echo "<br>";


$x = fopen("INBOUND_WEBHUB", "comment");
var_dump($x);     # Resource
echo "<br><br>  var_dump() use for display value with datatype";


?>