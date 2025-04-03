<?php
session_start();
include 'connection.php';
$Id = $_POST["id"];
$Name = $_POST["name"];
$Email = $_POST['email'];
$Password = md5($_POST['password']);
$Number = $_POST['mobile'];
$Gender = $_POST['gender'];
$dob = $_POST['dob'];
$Hobbies = implode(",", $_POST['hobbies']);
$Profile = $_POST['oldfile'];


 if(!empty($_FILES['image']['name'])){
    $targetDir = 'upload/';
    if(!is_dir($targetDir))
    {
        $targetDir = mkdir($targetDir, 0777, true);
    }

    $Profile = time() . '.' . pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
    $targetFile = $targetDir .$Profile;
    move_uploaded_file($_FILES["image"]["tmp_name"],$targetFile);
 }

 $sql = "UPDATE `registration` SET `name`='$Name',`email`='$Email',
        `password`='$Password',`phone`='$Number',`gender`='$Gender',`dob`='$dob',`hobbies`='$Hobbies',`image`='$Profile' WHERE `id`=$Id";

$result = mysqli_query($conn,$sql);

$result = mysqli_query($conn,$sql);

if($result){
    $_SESSION['edit'] = "Edit Successfull!";
    ?>
    <script>
        window.location.href="display.php<?php if(isset($_REQUEST['sort'])){?>?sort=<?php echo $_REQUEST['sort'];}?><?php if(isset($_REQUEST['field'])){?>&field=<?php echo $_REQUEST['field'];}?><?php if(isset($_REQUEST['search'])){?>&search=<?php echo $_REQUEST['search'];} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} if(isset($_REQUEST['page'])){ ?>&page=<?php echo $_REQUEST['page'];}?>";
    </script>
    <?php
}else{
    echo "Faild:" .mysqli_error($conn);
}
?>