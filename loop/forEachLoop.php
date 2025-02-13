<?php
$MobileNumber = array("rajesh" => "8302803362", "ravi" => "8094208916", "karan" => "9558044384");

foreach($MobileNumber as $number) 
{

    if($number == "8302803362")
    {
        echo "Rajesh's Mobile Number: $number";
    }

    if($number == "8094208916")
    {
        echo "Ravi's Mobile Number: $number";
    }

    if($number == "9558044384")
    {
        echo "karan's Mobile Number: $number";
    }
    
    echo "<br>";
}
?>