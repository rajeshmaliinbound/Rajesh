
<?php
// pattern print
//    *          * 
//   **          **
//  ***          ***
// ****          ****
//******************** 
//******************** 
// ****          ****
//  ***          ***
//   **          **
//    *          *

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <style>
       .arrow{
        display:flex;
       }
       
       .center{
        margin: 72px 3px 0 3px;
       }

    </style>
</head>
<body>

<div class="arrow">
   <div class="left-side">
       <?php

         $row = 5;

            for($i=1;$i<=$row;$i++)
            {
                for($j=$i;$j<$row;$j++)
                {
                    echo "&nbsp&nbsp ";
                }
            
                for($k=$j;$k<=$row+$i-1;$k++)
                {
                    echo "* ";
                }
                echo "<br>";
            }

            for($i=1;$i<=$row;$i++)
            {
                for($j=1;$j<$i;$j++)
                {
                    echo "&nbsp&nbsp ";
                }
            
                for($k=$j;$k<=$row;$k++)
                {
                    echo "* ";
                }
            
                echo "<br>";
            }
       ?>
   </div>

   <div class="center">
       <?php

         for($i=1;$i<=2;$i++)
         {
             for($j=1;$j<=10;$j++)
             {
                 echo "* ";
             }
         
             echo "<br>";
         }
       ?>
   </div>

   <div class="right-side">
       <?php

         for($i=1;$i<=$row;$i++)
         {
             for($j=1;$j<=$i;$j++)
             {
                 echo "* ";
             }
         
             echo "<br>";
         
         }

         for($i=1;$i<=$row;$i++)
         {
             for($k=$row; $k>=$i; $k--)
             {
                 echo "* ";
             }
         
             echo "<br>";
         }
       ?>
   </div>  
</div>


</body>
</html>

