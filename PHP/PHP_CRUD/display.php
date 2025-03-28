
<?php
include 'connection.php';
$limit = 5;
$page = 1;
$$searchpage = 1;

if(isset($_GET['page'])){
    $page = $_GET['page'];
    $offset = ($page-1)*$limit;
}

if(isset($_GET['searchpage'])){
    $searchpage = $_GET['searchpage'];
    $offset = ($searchpage-1)*$limit;
}

//sorting table Data
$field = isset($_GET['field']) ? $_GET['field'] : 'id';
$sort = isset($_GET['sort']) && $_GET['sort'] == 'desc' ? 'desc' : 'asc' ;

$sortOrder = $sort == 'desc' ? 'asc' : 'desc';
$sortIcon = $sort == 'asc' ? '⇧' : '⇩';

//search Data
if(isset($_POST['search']) || !$_POST['search'] == ''){
    $searchData = $_POST['search'];

    $search_sql = "SELECT * FROM registration WHERE name LIKE '%$searchData%' OR gender LIKE '$searchData' OR hobbies LIKE '%$searchData%' LIMIT {$offset},{$limit}";

    $result = mysqli_query($conn, $search_sql);

}else{
    if(isset($page)){
      $all_sql = "SELECT * FROM registration ORDER BY $field $sort LIMIT {$offset},{$limit}";
    }

    if(isset($searchpage));
    $result = $conn->query($all_sql);
}


include 'header.php';
?>
    <div class="contaiiner">
        <div class="header">
            <h1>All Registered Users</h1>
            <span class="btn"><a href="form.php">Add User</a></span>
             <form action="display.php" method="post" class="srcForm">
                <input type="text" name="search" value="<?php if(isset($_POST['search'])){ echo $_POST['search']; }?>" placeholder="Search by Name, Gender or Hobbies" id="data" require>
                <span><input type="submit" value="Search" id="srcbtn" style="width: 5% !important;"> <a href="display.php" style="text-decoration: none; color: green;">&nbsp&nbsp Refresh All</a></button></span>
                <script>
                    $(document).ready(function(){
                        $(".srcForm").submit(function(obj){
                            var isValid = true;

                            if($("#data").val()=== ''){
                            $("#data").attr("placeholder","Enter Value search from name,gender or hobbies Field");
                            isValid = false;
                            }

                            if(!isValid){
                                obj.preventDefault();
                            }
                        });
                    });
                </script>
             </form>

            <div class="Data">
                
              <!-- pagination start -->
                <?php
                if(isset($_POST['search'])){
                    $query = "SELECT * FROM registration WHERE name LIKE '%$searchData%' OR gender LIKE '$searchData' OR hobbies LIKE '%$searchData%'";
                }else{
                    $query = "SELECT * FROM registration ORDER BY $field $sort";
                }
                
                $result1 = mysqli_query($conn,$query);

                if(mysqli_num_rows($result) > 0){
                    $totel_row = mysqli_num_rows($result1);
                    $totel_page = ceil($totel_row/$limit);?>
                    
                    <div class="pagination">
                        <?php
                        if($page > 1){ ?>
                            <span class="fl"><a href="display.php?page=<?php echo $page-1?>"><<</a></span> <?php
                        }
                        ?>
                       
                    <?php
                    for($i=1;$i<=$totel_page;$i++){
                        if($page == $i){
                            $active = "activepage";
                        }else{
                            $active = "";
                        }

                        if(isset($_POST['search'])){
                            ?><span class="pageaa"><a class="<?php echo $active?>" href="display.php?searchpage=<?php echo $i?>"><?php echo $i; ?></a></span><?php
                        }else{
                            ?><span class="pageaa"><a class="<?php echo $active?>" href="display.php?searchpage=<?php echo $i?>"><?php echo $i; ?></a></span><?php
                        }
                    }
                    ?>
                    <?php
                    if($totel_page>$page){ ?>
                        <span class="fl"><a href="display.php?page=<?php echo $page+1?>">>></a></span> <?php
                    }
                    ?>
                </div> <?php
                }
                ?>
             <!-- Pagination End -->

                <table>
                    <tr>
                        <th>Table Rows</th>
                        <th><span class="thData"><a href="?field=id&sort=<?php echo $sortOrder; ?>">ID <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=name&sort=<?php echo $sortOrder; ?>">Name <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=email&sort=<?php echo $sortOrder; ?>">Email <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=password&sort=<?php echo $sortOrder; ?>">Password <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=phone&sort=<?php echo $sortOrder; ?>">Mobile Number <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=gender&sort=<?php echo $sortOrder; ?>">Gender <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=dob&sort=<?php echo $sortOrder; ?>">DOB <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=hobbies&sort=<?php echo $sortOrder; ?>">Hobbies <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=image&sort=<?php echo $sortOrder; ?>">Image <?php echo $sortIcon; ?></a></span></th>
                        <th colspan ="2">ACTIONS</th>
                    </tr>
                    <?php

                    if (mysqli_num_rows($result) > 0) {
                        $number = $offset;
                        while($row = mysqli_fetch_assoc($result))
                        {
                            ?>
                            <tr>
                            <?php $number = $number+1?>
                            <td><?php echo $number;?></td>                            
                            <td><?php echo $row["id"];?></td>
                            <td><?php echo $row["name"];?></td>
                            <td><?php echo $row["email"];?></td>
                            <td><?php echo $row["password"];?></td>
                            <td><?php echo $row["phone"];?></td>
                            <td><?php echo $row["gender"];?></td>
                            <td><?php echo $row["dob"];?></td>
                            <td><?php echo $row["hobbies"];?></td>
                            <td>
                                <img width="50" src="upload/<?php echo $row["image"] ?>" alt="Empty">
                            </td>
                            <td><a href="form.php?id=<?php echo $row["id"]?>">Edit</a></td>
                            <td><span><a href="delete.php?id=<?php echo $row["id"]?>" onclick="return confirm('Are you sure you want to delete this Row?')">Delete</a></span></td>
                            </tr><?php
                        }
                    } else {
                        ?><th colspan ="11">Data Not Found</th><?php
                    }                     
                    ?>
                </table>
           </div>
        </div>
    </div>
</body>
</html>