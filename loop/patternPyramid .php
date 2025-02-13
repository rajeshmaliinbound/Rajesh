<?php

//prinf follow this pattern
//        *
//       * *
//      * * *
//     * * * *
//    * * * * *
$row =5;
for($i=1;$i<=$row;$i++)
{

    for($j=$i;$j<=$row-1;$j++)
    {
     echo "&nbsp";
    }
 

   for($j=1;$j<=$i;$j++)
   {
    echo "* ";
   }

   echo "<br>";
}

?>