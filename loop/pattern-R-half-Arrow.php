<?php
// pattern print
// * 
// * * 
// * * * 
// * * * * 
// * * * * * 
// * * * * * 
// * * * * 
// * * * 
// * * 
// * 




$clm =10;
for($i=1;$i<=$clm;$i++)
{
    for($j=1;$j<=$i;$j++)
    {
        echo "* ";
    }

    echo "<br>";

}

for($i=1;$i<=$clm;$i++)
{
    for($k=$clm; $k>=$i; $k--)
    {
        echo "* ";
    }

    echo "<br>";
}


?>