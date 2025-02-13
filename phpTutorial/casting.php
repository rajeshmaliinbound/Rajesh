<?php
    $int = 5;
    $float = 10.5;
    $str = "22";
    $bool = true;
    $nl  = NULL;


//  Datatype convert in string
    $int = (string) $int;
    $float = (string) $float;
    $str = (string) $str;
    $bool = (string) $bool;
    $nl  = (string) $nl;
     
    echo "<pre>";
    var_dump($int);
    var_dump($float);  
    var_dump($str);
    var_dump($bool);
    var_dump($nl);


//  Datatype convert in integer
    $int = (int) $int;
    $float = (int) $float;
    $str = (int) $str;
    $bool = (int) $bool;
    $nl  = (int) $nl;
    
    echo "<pre>";
    var_dump($int);
    var_dump($float);  
    var_dump($str);
    var_dump($bool);
    var_dump($nl);


//  Datatype convert in float
    $int = (float) $int;
    $float = (float) $float;
    $str = (float) $str;
    $bool = (float) $bool;
    $nl  = (float) $nl;
    
    echo "<pre>";
    var_dump($int);
    var_dump($float);  
    var_dump($str);
    var_dump($bool);
    var_dump($nl);

    

//  Datatype convert in Boolean
    $int = (bool) $int;
    $float = (bool) $float;
    $str = (bool) $str;
    $bool = (bool) $bool;
    $nl  = (bool) $nl;
    
    echo "<pre>";
    var_dump($int);
    var_dump($float);  
    var_dump($str);
    var_dump($bool);
    var_dump($nl);

   

?>

