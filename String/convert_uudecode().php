<?php
$str = "Inbound Webhub Ahmedabad";

$encode = convert_uuencode($str);
echo "$encode<br><br>"; 

$decode = convert_uudecode($encode);//encode in binary into printable characters
echo "$decode";


?>