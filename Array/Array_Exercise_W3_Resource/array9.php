<?php
$record = " 78, 60, 62, 68, 71, 68, 73, 85, 66, 66, 75, 63, 75, 76, 73, 68, 61, 73, 72,
            65, 74, 66, 75, 65, 64, 68, 73, 75, 79, 73";


$array = explode("," , $record);

$count = 0;
$array_length = count($array);

foreach($array as $value)
{
 $count += $value;
}

// Calculate average temperature
$average = $count/$array_length;
echo "Average Temperature is : $average";

sort($array);

echo "<br>List of Five lowest temperatures: ";
for($i=0;$i<5;$i++)
{
    echo $array[$i]. ",";
}

echo "<br>list of five highest temperatures: ";
for($i= $array_length-5; $i<$array_length; $i++)
{
    echo $array[$i]. ",";
}

?>