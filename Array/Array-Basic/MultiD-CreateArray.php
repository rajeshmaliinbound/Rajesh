<?php
$multiArray = array(array("Rajesh", 22,8302803362),  //Create MultiDimensional Array
              array("RaviMali", 20,9773567821), //Create MultiDimensional  indexArray
              array("Name"=>"Karan", "Age"=>25, "Number"=>7284018094)); //Create MultiDimensional Associative Array

    echo "<pre>";
    print_r($multiArray); //accessArray

    echo "<br>";

    //access array data of RaviMali

    print_r($multiArray[1]);

    echo "<br>";
    print_r($multiArray[2]);
?>