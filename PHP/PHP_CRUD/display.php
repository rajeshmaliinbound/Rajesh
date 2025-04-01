
<?php
session_start();
if(isset($_REQUEST['limit'])){
    $limit = $_REQUEST['limit'];
}else{
    $limit = 5;
}
//include Database connection file include...
include 'connection.php';
$page = 1;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}

$offset = ($page-1)*$limit;
//sorting table Data
$field = isset($_GET['field']) ? $_GET['field'] : 'id';
$sort = isset($_GET['sort']) && $_GET['sort'] == 'desc' ? 'desc' : 'asc' ;

$sortOrder = $sort == 'desc' ? 'asc' : 'desc';
$sortIcon = $sort == 'asc' ? '⇧' : '⇩';

//find all row of search Data
if(isset($_REQUEST['search']) && !$_REQUEST['search'] == ''){
    $searchData = $_REQUEST['search'];

    $search_sql = "SELECT * FROM registration WHERE name LIKE '%$searchData%' OR gender LIKE '$searchData' OR hobbies LIKE '%$searchData%' ORDER BY $field $sort LIMIT {$offset},{$limit}";

    $result = mysqli_query($conn, $search_sql);

}else{
    //fetch all data from Database with sorting 
    if(isset($page)){
      $all_sql = "SELECT * FROM registration ORDER BY $field $sort LIMIT {$offset},{$limit}";
    }
    $result = $conn->query($all_sql);
}

// html structure
include 'header.php';
?>
    <div class="contaiiner">
        <div class="header">
            <h1>All Registered Users</h1>
            <span class="btn"><a href="form.php">Add User</a></span>
             <form action="display.php" method="post" class="srcForm">
                <input type="text" name="search" value="<?php if(isset($_REQUEST['search'])){ echo $_REQUEST['search']; }?>" placeholder="Search by Name, Gender or Hobbies" id="data" require>
                <input type="hidden" name="limit" value="<?php if(isset($limit)){ echo $limit; }?>">
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

              <!-- Show data using selected number of rows -->
              <div>
                    Select Number of Rows:<select name="" id="rows" style="width: 8%; margin-top: 10px; margin-bottom: 0px;">
                        <!-- <option selected disabled>select row</option> -->
                        <option>selects row</option>
                        <option value="5" <?php if(isset($_REQUEST['limit'])) { if($limit == 5){ echo "selected";} }?>>5</option>
                        <option value="10" <?php if(isset($_REQUEST['limit'])) { if($limit == 10){ echo "selected";} }?>>10</option>
                        <option value="15" <?php if(isset($_REQUEST['limit'])) { if($limit == 15){ echo "selected";} }?>>15</option>
                        <option value="20" <?php if(isset($_REQUEST['limit'])) { if($limit == 20){ echo "selected";} }?>>20</option>
                        <option value="25" <?php if(isset($_REQUEST['limit'])) { if($limit == 25){ echo "selected";} }?>>25</option>
                        <option value="30" <?php if(isset($_REQUEST['limit'])) { if($limit == 30){ echo "selected";} }?>>30</option>
                    </select>
                </div>
                <script>
                    $(document).ready(function(){
                        var limit = $("#rows").val();
                        $("#rows").change(function(){
                            limit = $(this).val();
                            window.location.href="display.php?<?php if(isset($_GET['sort'])){?>sort=<?php echo $_GET['sort'];}?>&<?php if(isset($_GET['field'])){?>field=<?php echo $_GET['field'];}?>&<?php if(isset($_REQUEST['search'])){?>search=<?php echo $_REQUEST['search'];}?>&limit=" +limit;
                        });
                    });
                </script>

            <div class="Data">
                
              <!-- pagination start -->
              <?php
                if(isset($_REQUEST['search'])){
                    $query = "SELECT * FROM registration WHERE name LIKE '%$searchData%' OR gender LIKE '$searchData' OR hobbies LIKE '%$searchData%' ORDER BY $field $sort";
                }else{
                    $query = "SELECT * FROM registration ORDER BY $field $sort";
                }

                $result1 = mysqli_query($conn,$query);  

                if(mysqli_num_rows($result) > 0){
                    $totel_row = mysqli_num_rows($result1);
                    $totel_page = ceil($totel_row/$limit);?>
                    
                    <div class="pagination">
                        <?php
                        if(isset($_REQUEST['search'])){
                            if($page > 1){?>
                               <span class="fl"><a href="display.php?search=<?php echo $searchData?>&page=<?php echo $page-1?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>"><<</a></span><?php 
                            }
                        }
                        elseif(isset($_REQUEST['field']) && isset($_REQUEST['sort'])){
                            if($page > 1){ ?>
                                <span class="fl"><a href="display.php?field=<?php echo $field;?>&sort=<?php echo $sort;?>&page=<?php echo $page-1;?>&limit=<?php echo $limit;?>"><<</a></span><?php 
                            }
                        }else{
                            if($page > 1){ ?>
                                <span class="fl"><a href="display.php?page=<?php echo $page-1?>&limit=<?php echo $limit;?>"><<</a></span> <?php
                            }
                        }
                        ?>
                       
                    <?php
                    for($i=1;$i<=$totel_page;$i++){
                        if($page == $i){
                            $active = "activepage";
                        }else{
                            $active = "";
                        }

                        if(isset($_REQUEST['search'])){
                            ?><span class="pageaa"><a class="<?php echo $active?>" href="display.php?search=<?php echo $searchData;?>&page=<?php echo $i;?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>"><?php echo $i; ?></a></span><?php
                        }
                        elseif(isset($_REQUEST['field']) && isset($_REQUEST['sort'])){
                            ?><span class="pageaa"><a class="<?php echo $active?>" href="display.php?field=<?php echo $field;?>&sort=<?php echo $sort;?>&page=<?php echo $i;?>&limit=<?php echo $limit;?>"><?php echo $i; ?></a></span><?php
                        }else{
                            ?><span class="pageaa"><a class="<?php echo $active?>" href="display.php?page=<?php echo $i?>&limit=<?php echo $limit;?>"><?php echo $i; ?></a></span><?php
                        }
                    }
                    ?>
                    <?php
                    if(isset($_REQUEST['search'])){
                        if($totel_page>$page){?>
                           <span class="fl"><a href="display.php?search=<?php echo $searchData?>&page=<?php echo $page+1?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>">>></a></span><?php 
                        }
                    }elseif(isset($_REQUEST['field']) && isset($_REQUEST['sort'])){
                        if($totel_page>$page){ ?>
                            <span class="fl"><a href="display.php?field=<?php echo $field;?>&sort=<?php echo $sort;?>&page=<?php echo $page+1;?>&limit=<?php echo $limit;?>">>></a></span><?php 
                        }
                    }else{
                        if($totel_page>$page){ ?>
                            <span class="fl"><a href="display.php?page=<?php echo $page+1?>&limit=<?php echo $limit;?>">>></a></span> <?php
                        }
                    }
                    ?>
                </div> <?php
                }
                ?>
             <!-- Pagination End -->

              <!-- new registration message show -->
              <div style="color: Green;"><h4><?php if(isset($_SESSION['useremail'])){ echo "regisration Successfull !"; session_unset();} ?></h4></div>

              <!-- Table structure -->
                <table>
                    <tr>
                        <th>Table Rows</th>
                        <th><span class="thData"><a href="?field=id&sort=<?php echo $sortOrder; ?><?php if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];}?>">ID <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=name&sort=<?php echo $sortOrder; ?><?php if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} ?>">Name <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=email&sort=<?php echo $sortOrder; ?><?php if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} ?>">Email <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=phone&sort=<?php echo $sortOrder; ?><?php if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} ?>">Mobile Number <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=gender&sort=<?php echo $sortOrder; if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} ?>">Gender <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=dob&sort=<?php echo $sortOrder; ?><?php if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} ?>">DOB <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=hobbies&sort=<?php echo $sortOrder; ?><?php if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} ?>">Hobbies <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=image&sort=<?php echo $sortOrder; ?><?php if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} ?>">Image <?php echo $sortIcon; ?></a></span></th>
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
                            <td><?php echo $row["phone"];?></td>
                            <td><?php echo $row["gender"];?></td>
                            <td><?php echo $row["dob"];?></td>
                            <td><?php echo $row["hobbies"];?></td>
                            <td>
                                <img width="50" src="upload/<?php echo $row["image"] ?>" alt="Empty">
                            </td>
                            <td><a href="form.php?id=<?php echo $row["id"]?>">Edit</a></td>
                            <td><span><a href="delete.php?field=<?php if(isset($field)){ echo $field; } ?>&sort=<?php if(isset($sort)){ echo $sort; } if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];}?>&page=<?php echo $page; ?> &id=<?php echo $row["id"]?>" onclick="return confirm('Are you sure you want to delete this Row?')">Delete</a></span></td>
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