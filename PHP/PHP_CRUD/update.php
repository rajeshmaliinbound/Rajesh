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

$selectFile = $_FILES['image']['name'];
$exassword = $_POST['password'];

$emailcheck = "SELECT * FROM registration WHERE email = '$Email' AND id != $Id";
$resultemail = mysqli_query($conn,$emailcheck);
if($resultemail->num_rows>0){
    $_SESSION['email_exist_edit'] = 'Email Already Exists...!';
    ?>
    <script>
        window.location.href="form.php?<?php if(isset($_REQUEST['sort'])){?>sort=<?php echo $_REQUEST['sort'];}?><?php if(isset($_REQUEST['field'])){?>&field=<?php echo $_REQUEST['field'];} if(isset($_REQUEST['search'])){?>&search=<?php echo $_REQUEST['search'];} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];} if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} if(isset($_REQUEST['page'])){ ?>&page=<?php echo $_REQUEST['page'];}if(isset($Id)){ ?>&id=<?php echo $Id;}?>&exitsname=<?php echo $Name;?>&exitsemail=<?php echo $Email;?>&exitspassword=<?php echo $exassword;?>&exitsphone=<?php echo $Number;?>&exitsgender=<?php echo $Gender;?>&exitsdob=<?php echo $dob;?>&exitshobbies=<?php echo $Hobbies;?>&exitimage=<?php echo $selectFile;?>";
    </script>
    <?php
    exit;
}else{
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
} 

$result = mysqli_query($conn,$sql);

if($result){
    $_SESSION['edit'] = "Edit Successfull!";
    ?>
    <script>
        window.location.href="display.php?<?php if(isset($_REQUEST['sort'])){?>sort=<?php echo $_REQUEST['sort'];}?><?php if(isset($_REQUEST['field'])){?>&field=<?php echo $_REQUEST['field'];} if(isset($_REQUEST['search'])){?>&search=<?php echo $_REQUEST['search'];} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];} if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} if(isset($_REQUEST['page'])){ ?>&page=<?php echo $_REQUEST['page'];}?>";
    </script>
    <?php
}else{
    echo "Faild:" .mysqli_error($conn);
}
?>