<!DOCTYPE html>
<html>
<body>
<table align="center" border="1" cellpadding="2" cellspacing="0">
<?php

$result =0;

for($i=1; $i<=10;$i++)
{
    echo "<tr>";

    for($j=1;$j<=10;$j++)
    {

        $result = $i * $j ;
        echo "<td>" .$result . "</td>";
    }
}


?>
</table>
</body>
</html>
