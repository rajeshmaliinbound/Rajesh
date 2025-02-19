<?php
function  bubbleSort($arrayValue)
{
  $n = count($arrayValue);
//   echo "N value is :  $n";
//   exit;
  for($i=0;$i<$n;$i++)
  {
     for($j=0; $j<$n-1-$i;$j++)
     {
        
        if($arrayValue[$j]>$arrayValue[$j+1])
        {
            $swapValue = $arrayValue[$j];
            $arrayValue[$j] = $arrayValue[$j + 1];
            $arrayValue[$j + 1] = $swapValue;
        }
     }
  }
  return $arrayValue;
}

// Insertion sort

$arrayValue = [83,93,32,34,32,42];
$bubble = bubbleSort($arrayValue);
echo "<pre>";
print_r($bubble);
?>
