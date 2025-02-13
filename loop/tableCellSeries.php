<!DOCTYPE html>
<html>
<body>
<table align="center" border="1" cellpadding="3" cellspacing="0">
<?php

$result =0;

for($i=1; $i<=6;$i++)
{
    echo "<tr>";

    for($j=1;$j<=5;$j++)
    {
        $result = $i * $j ;
        echo "<td> $i * $j = " .$result . "</td>";
    }



}


?>
</table>
</body>
</html>
