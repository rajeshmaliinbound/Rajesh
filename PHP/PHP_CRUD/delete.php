<?php
include 'connection.php';
$Id = $_GET['id'];

$query = "DELETE FROM `registration` WHERE `id`=$Id";

$result = mysqli_query($conn,$query);

// if ($result) {
//     $imagePath = $result['image'];

//     $fullImagePath = __DIR__ . '/upload/' . $imagePath;
//     echo "image".$imagePath ."<br>";
//     echo "image".$imagePath ."<br>";

//     if (file_exists($fullImagePath)) {
//         unlink($fullImagePath); 
//         echo "<br>delete success";
//         exit;  
//     }
// }

if($result){
    header("location:display.php");
}else{
    echo "Faild:" .mysqli_error($conn);
}
?>