<?php
include 'connection.php';
session_start();
$Id = $_GET['id'];

if(isset($_REQUEST['limit'])){
    $limit = $_REQUEST['limit'];
}

$query = "SELECT image FROM `registration` WHERE `id` = $Id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row) {
    $imagePath = $row['image'];

    $deleteQuery = "DELETE FROM `registration` WHERE `id` = $Id";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    $rows = $_SESSION['deletepath']-1;
    unset($_SESSION['deletepath']);
    $totel_page = ceil($rows/$limit);
    if($totel_page >= $_REQUEST['page']){
        $page = $_REQUEST['page'];
    }else{
        $page = $totel_page;
    }

    if ($deleteResult) {
        $imageFullPath = 'upload/' . $imagePath;

        if (file_exists($imageFullPath)) {
            unlink($imageFullPath);
        }

        $_SESSION['delete'] = "Delete Successful!";
        ?>
        <script>
          window.location.href="display.php<?php if(isset($_REQUEST['sort'])){?>?sort=<?php echo $_REQUEST['sort'];}?><?php if(isset($_REQUEST['field'])){?>&field=<?php echo $_REQUEST['field'];}?><?php if(isset($_REQUEST['search'])){?>&search=<?php echo $_REQUEST['search'];} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];} if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];} if(isset($_REQUEST['page'])){ ?>&page=<?php echo $_REQUEST['page'];}?>";
        </script>
        <?php
    } else{
        echo "Faild:" .mysqli_error($conn);
    }
}
?>