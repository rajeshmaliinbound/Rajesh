<?php
include 'connection.php';
session_start();
$Id = $_GET['id'];

$query = "DELETE FROM `registration` WHERE `id`=$Id";
if(isset($_REQUEST['limit'])){
    $limit = $_REQUEST['limit'];
}

$result = mysqli_query($conn,$query);
$rows = $_SESSION['deletepath']-1;
unset($_SESSION['deletepath']);
$totel_page = ceil($rows/$limit);
if($totel_page >= $_REQUEST['page']){
    $page = $_REQUEST['page'];
}else{
    $page = $totel_page;
}

if($result){
    $_SESSION['delete']= "Delete Successfull!";
    ?>
    <script>
        window.location.href="display.php<?php if(isset($_REQUEST['sort'])){?>?sort=<?php echo $_REQUEST['sort'];}?><?php if(isset($_REQUEST['field'])){?>&field=<?php echo $_REQUEST['field'];}?><?php if(isset($_REQUEST['search'])){?>&search=<?php echo $_REQUEST['search'];} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];} if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];} if(isset($page)){ ?>&page=<?php echo $page;}?>";
    </script>
    <?php
}else{
    echo "Faild:" .mysqli_error($conn);
}
?>