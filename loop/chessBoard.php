<!DOCTYPE html>
<html>
<head>p
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <style>
       table{
        width: 270px;
       }

       tr{
        height: 30px;
       }


    </style>
</head>
<body>
<table  width: 270px; cellspacing="0" border="1" align="center">

<?php
  $row = 8;
 for($i = 1; $i <= $row; $i++)
  {
    echo "<tr>";
    for($j = 1; $j <= $row; $j++)
    {

        $trd = $i + $j;

        if($trd % 2 == 0)
        {
            echo "<td height=30px width=30px bgcolor=white></td>";

        }else{

            echo "<td height=30px width=30px bgcolor=black></td>";

        }
        

    }

    echo "</tr>";
  }
?>
		
</table>

</body>
</html>