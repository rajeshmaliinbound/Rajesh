<?php

//string value contst
define("NAME", "Rajesh Kumar! <br>");
echo NAME;


//array value contst
define("cars", ["BMW","RR","Maruti"]);
  echo cars[2] . "<br>";


  //contst with method 
define("GREETING", "Good Morning!");

function myTest() {
  echo GREETING; #agar ak constant function ke bahar define kiya hai, to constant ko fun. ke andar bhi use kr skte he.
}
myTest();
?> 