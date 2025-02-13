<?php
$car = array("BMW", "MUSTANG", "Audy", "Fourtuner");

foreach($car as $cars)
{
  if($car[2]=="Audy")
  {
    echo "Condition True <br>";   //Array access Using for each loop
    echo $car[2];
    exit;
  }
}
?>  