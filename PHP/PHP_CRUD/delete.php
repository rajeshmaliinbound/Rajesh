<?php
include 'connection.php';
$Id = $_GET['id'];

if(isset($_REQUEST['field'])){
    $field = $_REQUEST['field'];
}

if(isset($_REQUEST['sort'])){
    $sort = $_REQUEST['sort'];
}

if(isset($_REQUEST['search'])){
    $search = $_REQUEST['search'];
}

if(isset($_REQUEST['limit'])){
    $limit = $_REQUEST['limit'];
}

if(isset($_REQUEST['page'])){
    $page = $_REQUEST['page'];
}


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
    ?>
    <script>
        window.location.href="display.php?<?php if(isset($_REQUEST['sort'])){?>sort=<?php echo $_REQUEST['sort'];}?>&<?php if(isset($_REQUEST['field'])){?>field=<?php echo $_REQUEST['field'];}?>&<?php if(isset($_REQUEST['search'])){?>search=<?php echo $_REQUEST['search'];} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];}?>&page=<?php echo $page; ?>";
    </script>
    <?php
    header("location:display.php? &sort=$sort &limit=$limit &page=$page &search=$search");
}else{
    echo "Faild:" .mysqli_error($conn);
}
?>