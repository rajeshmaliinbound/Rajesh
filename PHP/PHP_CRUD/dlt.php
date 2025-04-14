<?php
session_start();
include 'connection.php';

$Name = $_POST["name"];
$Email = $_POST['email'];
$Password = md5($_POST['password']);
$Number = $_POST['mobile'];
$Gender = $_POST['gender'];
$dob = $_POST['dob'];
$Hobbies = implode(",", $_POST['hobbies']);
$image = '';

if($_FILES['image']){
    $targetDir = 'upload/';
    $image = time() . '.' . pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
    $targetFile = $targetDir .$image;
    move_uploaded_file($_FILES["image"]["tmp_name"],$targetFile);
}

$sql = "INSERT INTO `registration`(`name`, `email`, `password`, `phone`, `gender`, `dob`, `hobbies`, `image`)
         VALUES ('$Name','$Email','$Password','$Number','$Gender','$dob','$Hobbies','$image')";
$result = mysqli_query($conn,$sql);

if($result){
    $_SESSION['useremail'] = $Email;
    header("location:display.php");
}else{
    echo "Faild:" .mysqli_error($conn);
}
?>