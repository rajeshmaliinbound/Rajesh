<?php
include 'connection.php';
$Id = $_GET['id'];

$query = "DELETE FROM `registration` WHERE `id`=$Id";

$result = mysqli_query($conn,$query);

if($result){
    header("location:display.php");
}else{
    echo "Faild:" .mysqli_error($conn);
}
?>