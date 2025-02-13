<?php
$day = "0";

switch($day)
{
    case "1":
        echo "monday";
        break;

    case "2":
        echo "Tousday";
        break;
        
    case "3":
        echo "Wednesday";
        break;
        
    case "4":
        echo "Thrusday";
        break;
        
    case "5":
        echo "Friday";
        break;
        
    case "6":
        echo "Saturday";
        break;
        
    case "7":
        echo "Sunday";
        break;
        
        default:
        echo "wrong day! day type is=> $day";
}
?>