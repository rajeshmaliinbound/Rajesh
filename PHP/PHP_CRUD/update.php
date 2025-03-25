<?php
include 'connection.php';
$Id =  $_POST["id"];
$Name = $_POST["name"];
$Email = $_POST['email'];
$Password = md5($_POST['password']);
$Gender = $_POST['gender'];
$Profile = $_POST['oldfile'];

 if(!empty($_FILES['profile']['name'])){
    $targetDir = 'upload/';
    if(!is_dir($targetDir))
    {
        $targetDir = mkdir($targetDir, 0777, true);
    }

    $Profile = time() . '.' . pathinfo($_FILES["profile"]["name"],PATHINFO_EXTENSION);
    $targetFile = $targetDir .$Profile;
    move_uploaded_file($_FILES["profile"]["tmp_name"],$targetFile);
 }

 $sql = "UPDATE `student` SET `name`='$Name',`email`='$Email',
                              `password`='$Password',`gender`='$Gender',`image`='$Profile' WHERE `id`=$Id";
 
$result = mysqli_query($conn,$sql);

$result = mysqli_query($conn,$sql);

if($result){
    header("location:display.php");
}else{
    echo "Faild:" .mysqli_error($conn);
}
?>