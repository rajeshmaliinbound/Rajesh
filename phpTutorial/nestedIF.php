<?php

$age = 20;

if($age>=18)
{
    echo "You are eligible for driving <br>";

    if($age>=5)
    {
            echo "You are not eligible for Studies <br>"; 
    
            if($age>=21)
            {
                echo "You are eligible for marriage <br>"; 
            }else{
                echo "You are eligible for marriage because your age is: $age <br>";
            }
            
    }else{
        echo "You are not eligible for driving because your age is: $age <br>";
    }
}else{
    
    echo "all conditions are false";

}

?>