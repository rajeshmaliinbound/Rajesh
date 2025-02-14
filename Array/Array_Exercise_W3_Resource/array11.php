<?php
/*15. Write a PHP script to generate unique random numbers within a range.
Sample Range : (11, 20)
Sample Output : 17 16 13 20 14 19 18 15 11 12*/

$number = range(11,20);

for($i=1; $i<=10;$i++)
{
    $value = rand(11,20);
    echo "$value ";
}
?>