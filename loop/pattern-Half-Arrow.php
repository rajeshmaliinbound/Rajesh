<?php
// pattern print
//        * 
//      * *
//    * * * 
//  * * * * 
//* * * * * 
//* * * * * 
//  * * * * 
//    * * * 
//      * * 
//        * 
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
