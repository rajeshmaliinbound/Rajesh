<?php

//prinf follow this pattern
// *       *
//   *   *
//     *
//   *   *
// *       * 
$num=11;
for($r=1;$r<=$num;$r++)
{
    for($c=1;$c<=$num;$c++)
    {

        if(($r==$c || $r+$c==$num+1))

        {
            echo "*";
        }else{
            echo "&nbsp&nbsp";
        }
        
    }

    echo "<br>";

   
}


?>