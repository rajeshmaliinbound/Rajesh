<?php
// Write a PHP program which iterates the integers from 1 to 50. For multiples of three print "Fizz" instead 
// of the number and for the multiples of five print "Buzz". For numbers which are multiples of both three 
// and five print "FizzBuzz".   
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <style>
       .main{
        display:flex;
       }

       .left{
        margin-right:10px;        
       }

    </style>
</head>
<body>

<div class="main">
   <div class="left">

        <?php
            for($i=1; $i<=25;$i++)
            {
        
        
            if($i%3==0)
                {
                echo" Fizz";        
                }
        
                if($i%5==0)
                {
                echo"Buzz";        
                }
        
        
            if(!($i%3==0 || $i%5==0 || $i%3==0 && $i%5==0))
            {
                echo "$i";
            }    
        
            echo "<br>";
            }
        ?>       
   </div>

   <div class="Right">

        <?php
            for($i=26; $i<=50;$i++)
            {
        
        
            if($i%3==0)
                {
                echo" Fizz";        
                }
        
                if($i%5==0)
                {
                echo"Buzz";        
                }
        
        
            if(!($i%3==0 || $i%5==0 || $i%3==0 && $i%5==0))
            {
                echo "$i";
            }    
        
            echo "<br>";
            }
        ?>       
   </div>


  
</div>


</body>
</html>
