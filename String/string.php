<?php
$value = "Hello Inbound webhub";
$value1 = "rAjesh";
$array = ['hello','Inbound','Webhub'] ;

#lowercase to Uppercase conver string
echo strtoupper($value); echo "<br><br>";

#Uppercase to lowercase convert string
echo  strtolower($value);  echo "<br><br>" ;

#Replace string value
$str = "Karan or Durgesh dono Dost he ";
echo str_replace(["Karan", "Durgesh"], ["Rajesh", "Ravi"], $str); echo "<br><br>" ;

#Remove unwanted space to string
echo trim($value); echo "<br><br>" ;

#Array to string convert
$string = implode(',' , $array ); 
echo  $string;  echo "<br><br>" ;

#string to array convert 
$array = explode(' ', $string);
print_r($array); echo "<br><br>";

#find substring value 
$substring = substr($value, 13, 7);
echo $substring;  echo "<br><br>";  

# check string position
$strposition = strpos($value, "Inbound");
echo $strposition;  echo "<br><br>";

#string first word to first character change in capital later
$str = ucfirst($value1);
echo $str;  echo "<br><br>";

#string any word to first character change in capital later
$str = ucwords($value);
echo $str;  echo "<br><br>";
 
#srtring to array covert with take default 1 character & covert array format  and optional assign length

echo $value;  echo "<br>";
$string =  str_split($value);
print_r($string); 
?>