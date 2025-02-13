<?php
$x = 10;
$y = 20;
$c = 50;

#Arithmetic Operators
echo "Arithmetic Operators";echo"<br>";
echo $x+$y; echo"<br>"; #Sum of $x and $y
echo $x-$y; echo"<br>"; #Difference of $x and $y
echo $x*$y; echo"<br>"; #Product of $x and $y
echo $x/$y; echo"<br>"; #Quotient of $x and $y
echo $x%$y; echo"<br>"; #Remainder of $x divided by $y
echo $x**$y;            #Result of raising $x to the $y'th power

echo"<br><br>";

#Assignment  Operators
$y = 2;

echo "Assignment Operators";echo"<br>";
echo $x=$y; echo"<br>";  #assign value to variable 
echo $x+=$y; echo"<br>"; #$x value Addition with $Y value
echo $x-=$y; echo"<br>"; #$x value difference with $Y value
echo $x*=$y; echo"<br>";  #$x value multipling with $Y value
echo $x/=$y; echo"<br>";  #$x value divided with $Y value
echo $x%=$y;              #reminder of $x value divided by $Y value
echo"<br><br>";


// #Comparison  Operators
echo "Comparison Operators";
$result = $x==$y;
echo"<br>";  

echo $x===$y; echo"<br>";
echo $x!=$y; echo"<br>";
echo $x<>$y; echo"<br>";
echo $x!==$y; echo"<br>";
echo $x>=$y; echo"<br>";
echo $x<=$y; echo"<br>";
echo $x<=>$y;

?>