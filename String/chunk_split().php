<?php
$str = "inbound webhub Ahmedabad";
echo "$str <br>";

$newstr = chunk_split($str,1,"-");

echo "$newstr";


?>