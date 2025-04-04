<?php
include 'connection.php';
session_start();
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
    $_SESSION['delete']= "Delete Successfull!";
    ?>
    <script>
        window.location.href="display.php<?php if(isset($_REQUEST['sort'])){?>?sort=<?php echo $_REQUEST['sort'];}?><?php if(isset($_REQUEST['field'])){?>&field=<?php echo $_REQUEST['field'];}?><?php if(isset($_REQUEST['search'])){?>&search=<?php echo $_REQUEST['search'];} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];} if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];} if(isset($_REQUEST['page'])){ ?>&page=<?php echo $_REQUEST['page'];}?>";
    </script>
    <?php
}else{
    echo "Faild:" .mysqli_error($conn);
}
?>