<?php
    $value = 10;
    $value1 = "hello Rajesh";
    $value2 = [10,20,30];

    echo $value;
    echo "<br><br>";  #use of echo 


    $var = print $value1;  #use of print 
    echo "<br>";  
    echo $var;
    echo "<br><br>";


    print_r($value2);   #use of print_r() function
    echo "<br><br>";

    $output = sprintf("%d, %s", $value, $value1);   #use of sprintf() function 
    echo $output;
    echo "<br><br>";

    var_dump( $output);   #use of var_dump() function 
    echo "<br><br>";

    var_export($value2);  #use of var_export() function 
    echo "<br><br>";

    highlight_string($value1);   #use of highlight_string() function 

?>