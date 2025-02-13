<?php

$row=8;
for($i=1;$i<=$row;$i++)
{
   for($j=1; $j<=$i;$j++)
   {     
    echo "$j ";
  
   }

   for($k=$j; $k>=1;$k--)
   {     
    echo "$k ";
  
   }
   


   echo "<br>";
}
?>