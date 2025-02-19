<?php

function selectionSort($arr)
{
   $n = count($arr); //5

   for($i=0; $i<$n-1;$i++)//0 to 5 
   {
    $minIndex = $i; //m-0

      for($j=$i+1; $j<$n-1;$j++)//1<4
      {
            // echo "<br><br><br>j value: ";
            // print_r($arr[$j]);
    
            // echo "<br>index value: ";
            // print_r($arr[$minIndex]);

            // echo "MinIndex Value: $minIndex";

         if($arr[$j] < $arr[$minIndex]) //1<0 
         {
           $minIndex = $j;     
         }
      }


         echo "minIndex = $minIndex <br>";
         echo "i value = $i <br><br>";

         if($minIndex != $i)
         {
            
         }
   }
}

$arr = [64, 25, 12, 22, 11];
$ascendingArray = selectionSort($arr);
echo "<pre>";
print_r($ascendingArray);
?>