<?php
$color = array("white", "green", "red");

$colors = implode(',' ,$color);
echo "$colors <br>";

$clr = sort($color);
foreach($color as $Colors)
{
  echo "<br>";

  if($Colors == "green")
  {
   echo "<li>$Colors</li>";
  }

  if($Colors == "red")
  {
   echo "<li>$Colors</li>";
  }

  if($Colors == "white")
  {
   echo "<li>$Colors</li>";
  }
}


?>