<?php

function selectionSort($arr)
{
   $n = count($arr); //5

   for($i=0; $i<$n-1;$i++)//0 to 5 
   {
    $minIndex = $i; //m-0

      for($j=$i+1; $j<$n;$j++)//1<4                                                              
      {

         if($arr[$j] < $arr[$minIndex]) //1<0 
         {
           $minIndex = $j;     
         }
      }
        //  echo "minIndex = $minIndex <br>";
        //  echo "i value = $i <br><br>";

         if($minIndex != $i)
         {
            $data = $arr[$i];
            $arr[$i] = $arr[$minIndex];
            $arr[$minIndex] = $data;
         }
         
   }

   return $arr;
}

//Selection sort
$arr = [64, 25, 12, 22, 11];
$ascendingArray = selectionSort($arr);
echo "<pre>";
print_r($ascendingArray);
?>