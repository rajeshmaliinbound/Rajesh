<?php
$arrayValue = array("color1"=>"yellow", "color2"=>"pink", "color3"=>"orrange", "color4"=>"green",
                    "color5"=>"yellow", "color6"=>"pink", "color7"=>"orrange", "color8"=>"green");

if(array_key_exists("color6",$arrayValue))
{
    echo "key existing";
}else{
    echo "Key Does not Existing";
}
?>