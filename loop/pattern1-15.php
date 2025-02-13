<?php

for($i=1;$i<=5;$i++)
{                                  // 1
   for($j=1; $j<=$i;$j++)          // 1 2
   {                               // 1 2 3
    echo "$j ";                    // 1 2 3 4
   }                               // 1 2 3 4 5
   echo "<br>";
}

echo "<br><br>";

$cnt = 1;
for($i=1;$i<=5;$i++)
{                                  // 1
   for($j=1; $j<=$i;$j++)          // 1 2
   {                               // 1 2 3
    echo "$cnt ";                  // 1 2 3 4
    $cnt++;                        // 1 2 3 4 5
   }                               
   echo "<br>";
}

