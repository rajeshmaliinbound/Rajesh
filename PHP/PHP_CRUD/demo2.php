
<?php
session_start();
// set limit for show number of rows
if(isset($_REQUEST['limit'])){
    $limit = $_REQUEST['limit'];
}else{
    $limit = 5;
}
//include Database connection file...
include 'connection.php';

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$offset = ($page-1)*$limit;
//sorting ascending & dscending order formate of table Data
$field = isset($_GET['field']) ? $_GET['field'] : 'id';
$sort = isset($_GET['sort']) && $_GET['sort'] == 'desc' ? 'desc' : 'asc' ;

$sortOrder = $sort == 'desc' ? 'asc' : 'desc';
$sortIcon = $sort == 'asc' ? '⇧' : '⇩';

//find all row of search Data
if(isset($_REQUEST['search'])){
    $searchData = trim($_REQUEST['search']);
    if(isset($_REQUEST['fgender']) || isset($_REQUEST['fhobbies'])){

        if(isset($_REQUEST['fgender'])){
            $fgender = $_REQUEST['fgender'];
            $all_sql = "SELECT * FROM registration WHERE gender LIKE '$fgender' AND (name LIKE '%$searchData%' OR gender LIKE '$searchData' OR hobbies LIKE '%$searchData%') ORDER BY $field $sort LIMIT {$offset},{$limit}";
        }

        if(isset($_REQUEST['fhobbies'])){
            $fhobbies = $_REQUEST['fhobbies'];
            $all_sql = "SELECT * FROM registration WHERE hobbies LIKE '%$fhobbies%' AND (name LIKE '%$searchData%' OR gender LIKE '$searchData' OR hobbies LIKE '%$searchData%') ORDER BY $field $sort LIMIT {$offset},{$limit}";
        }

        if(isset($_REQUEST['fgender']) && isset($_REQUEST['fhobbies'])){
            $fgender = $_REQUEST['fgender'];
            $fhobbies = $_REQUEST['fhobbies'];
            $all_sql = "SELECT * FROM registration WHERE (gender LIKE '$fgender' AND hobbies LIKE '%$fhobbies%') AND (name LIKE '%$searchData%' OR gender LIKE '%$searchData%' OR hobbies LIKE '%$searchData%') ORDER BY $field $sort LIMIT {$offset},{$limit}";
        }

        if(isset($_REQUEST['search']) && isset($_REQUEST['fgender']) && isset($_REQUEST['fhobbies'])){
            $all_sql = "SELECT * FROM registration WHERE (name LIKE '%$searchData%' OR gender LIKE '$searchData' OR hobbies LIKE '%$searchData%') AND gender LIKE '$fgender' AND hobbies LIKE '%$fhobbies%' ORDER BY $field $sort LIMIT {$offset},{$limit}";
        }
    }else{
        $all_sql = "SELECT * FROM registration WHERE name LIKE '%$searchData%' OR gender LIKE '$searchData' OR hobbies LIKE '%$searchData%' ORDER BY $field $sort LIMIT {$offset},{$limit}";
    }

    $result = mysqli_query($conn, $all_sql);

}else{
    // Filteration Queries without search
    if(isset($_REQUEST['fgender']) || isset($_REQUEST['fhobbies'])){

        if(isset($_REQUEST['fgender'])){
            $fgender = $_REQUEST['fgender'];
            $all_sql = "SELECT * FROM registration WHERE gender LIKE '$fgender' ORDER BY $field $sort LIMIT {$offset},{$limit}";
            $result = mysqli_query($conn, $all_sql);
        }

        if(isset($_REQUEST['fhobbies'])){
            $fhobbies = $_REQUEST['fhobbies'];
            $all_sql = "SELECT * FROM registration WHERE hobbies LIKE '%$fhobbies%' ORDER BY $field $sort LIMIT {$offset},{$limit}";
            $result = mysqli_query($conn, $all_sql);
        }

        if(isset($_REQUEST['fgender']) && isset($_REQUEST['fhobbies'])){
            $fgender = $_REQUEST['fgender'];
            $fhobbies = $_REQUEST['fhobbies'];
            $all_sql = "SELECT * FROM registration WHERE gender LIKE '$fgender' AND hobbies LIKE '%$fhobbies%' ORDER BY $field $sort LIMIT {$offset},{$limit}";
            $result = mysqli_query($conn, $all_sql);
         }

    }else{
        $all_sql = "SELECT * FROM registration ORDER BY $field $sort LIMIT {$offset},{$limit}";
        $result = mysqli_query($conn, $all_sql);
    }
}

// html structure
include 'header.php';
?>
    <div class="contaiiner">
        <div class="header">
            <h1>All Registered Users</h1>

            <!-- Filteration Structure Start -->
            <div style="margin-left: 58%; display: flex; align-items: center; justify-content: right;">
                <h2 style="padding-right: 10px; margin-top:10px;">Filteration:</h2>
                <select class="filteration" id="fgender">
                <option value="" <?php if(isset($_REQUEST['fgender'])){ if($_REQUEST['fgender']=== ''){ echo "selected"; } }?>>Select Gender</option>
                <option value="Male"<?php if(isset($_REQUEST['fgender'])){ if($_REQUEST['fgender']=== 'Male'){ echo "selected"; } }?>>Male</option>
                <option value="Female" <?php if(isset($_REQUEST['fgender'])){ if($_REQUEST['fgender']=== 'Female'){ echo "selected"; } }?>>Female</option>
                </select>

                <select class="filteration" id="fhobbies" style="width: 100%; margin-left: 5px;">
                <option value="" <?php if(isset($_REQUEST['fhobbies'])){ if($_REQUEST['fhobbies']=== ''){ echo "selected"; } }?>>Select Hobbies</option>
                <option value="Coding" <?php if(isset($_REQUEST['fhobbies'])){ if($_REQUEST['fhobbies']=== 'Coding'){ echo "selected"; } }?>>Coding</option>
                <option value="traveling" <?php if(isset($_REQUEST['fhobbies'])){ if($_REQUEST['fhobbies']=== 'traveling'){ echo "selected"; } }?>>traveling</option>
                <option value="sports" <?php if(isset($_REQUEST['fhobbies'])){ if($_REQUEST['fhobbies']=== 'sports'){ echo "selected"; } }?>>sports</option>
                <option value="music" <?php if(isset($_REQUEST['fhobbies'])){ if($_REQUEST['fhobbies']=== 'music'){ echo "selected"; } }?>>music</option>
                <option value="art" <?php if(isset($_REQUEST['fhobbies'])){ if($_REQUEST['fhobbies']=== 'art'){ echo "selected"; } }?>>art</option>
                </select>
            </div>
             <!-- filteration Query -->
            <script>
                $(document).ready(function(){    
                    $("#fgender").change(function(){
                        let genderVal = $(this).val();
                        if(!genderVal== ""){
                            window.location.href="display.php?<?php if(isset($_GET['sort'])){?>sort=<?php echo $_GET['sort'];} if(isset($_GET['field'])){?>&field=<?php echo $_GET['field'];} if(isset($_REQUEST['search'])){ echo "&search=".$searchData;} if(isset($_REQUEST['fhobbies'])){?>&fhobbies=<?php echo $_REQUEST['fhobbies'];} if(isset($limit)){ ?>&limit=<?php echo $limit;} ?>&fgender=" +genderVal;
                        }else{
                            window.location.href="display.php?<?php if(isset($_GET['sort'])){?>sort=<?php echo $_GET['sort'];} if(isset($_GET['field'])){?>&field=<?php echo $_GET['field'];} if(isset($_REQUEST['search'])){ echo "&search=".$searchData;} if(isset($_REQUEST['fhobbies'])){?>&fhobbies=<?php echo $_REQUEST['fhobbies'];} if(isset($limit)){ ?>&limit=<?php echo $limit;}?>";
                        }
                    });

                    $("#fhobbies").change(function(){
                        let hobbieVal = $(this).val();
                        if(!hobbieVal== ""){
                            window.location.href="display.php?<?php if(isset($_GET['sort'])){?>sort=<?php echo $_GET['sort'];} if(isset($_GET['field'])){?>&field=<?php echo $_GET['field'];} if(isset($_REQUEST['search'])){ echo "&search=".$searchData;} if(isset($_REQUEST['fgender'])){?>&fgender=<?php echo $_REQUEST['fgender'];} if(isset($limit)){ ?>&limit=<?php echo $limit;}?>&fhobbies=" +hobbieVal;
                        }else{
                            window.location.href="display.php?<?php if(isset($_GET['sort'])){?>sort=<?php echo $_GET['sort'];} if(isset($_GET['field'])){?>&field=<?php echo $_GET['field'];} if(isset($_REQUEST['search'])){ echo "&search=".$searchData;} if(isset($_REQUEST['fgender'])){?>&fgender=<?php echo $_REQUEST['fgender'];} if(isset($limit)){ ?>&limit=<?php echo $limit;} ?>";
                        }
                    });
                });
            </script>
            <!-- Filteration Structure End -->

            <span class="btn"><a href="form.php?field=<?php if(isset($field)){ echo $field; } ?>&sort=<?php if(isset($sort)){ echo $sort; } if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($limit)){ ?>&limit=<?php echo $limit;} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];} if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];}?>&page=<?php echo $page;?>">Add User</a></span>
             <form action="display.php <?php if(isset($_REQUEST['limit'])){ echo '?limit='.$_REQUEST['limit'];} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];} if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];} ?>" method="post" class="srcForm">
                <input type="text" name="search" value="<?php if(isset($_REQUEST['search'])){ echo trim($_REQUEST['search']);}?>" placeholder="Search by Name, Gender or Hobbies" id="data" require>
                <span><input type="submit" value="Search" id="srcbtn" style="width: 6% !important;"> <a href="display.php" style="text-decoration: none; color: green;">&nbsp&nbsp Refresh All</a></button></span>
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
                    Select Number of Rows:<select name="" id="rows" style="width: 4%; margin-top: 10px; margin-bottom: 0px;">
                        <option value="5" <?php if(isset($_REQUEST['limit']))  { if($limit == 5){ echo "selected";} }?>>5</option>
                        <option value="10" <?php if(isset($_REQUEST['limit'])) { if($limit == 10){ echo "selected";} }?>>10</option>
                        <option value="15" <?php if(isset($_REQUEST['limit'])) { if($limit == 15){ echo "selected";} }?>>15</option>
                        <option value="20" <?php if(isset($_REQUEST['limit'])) { if($limit == 20){ echo "selected";} }?>>20</option>
                        <option value="25" <?php if(isset($_REQUEST['limit'])) { if($limit == 25){ echo "selected";} }?>>25</option>
                        <option value="30" <?php if(isset($_REQUEST['limit'])) { if($limit == 30){ echo "selected";} }?>>30</option>
                        <option value="200" <?php if(isset($_REQUEST['limit'])) { if($limit == 200){ echo "selected";} }?>>100</option>
                    </select>
                </div>
                <script>
                    $(document).ready(function(){
                        var limit = $("#rows").val();
                        $("#rows").change(function(){
                            limit = $(this).val();
                            window.location.href="display.php?<?php if(isset($_GET['sort'])){?>sort=<?php echo $_GET['sort'];}?><?php if(isset($_GET['field'])){?>&field=<?php echo $_GET['field'];}?><?php if(isset($_REQUEST['search'])){?>&search=<?php echo trim($_REQUEST['search']);} if(isset($_REQUEST['fgender'])){?>&fgender=<?php echo $_REQUEST['fgender'];} if(isset($_REQUEST['fhobbies'])){?>&fhobbies=<?php echo $_REQUEST['fhobbies'];}?>&limit=" +limit;
                        });
                    });
                </script> 
                
                <!-- Registration,Edit,Delete Message show -->
                <div style="color: Green;"><h4 id="newuser"></h4></div>
                 <?php
                //  Show Registration message after Registred new User...
                if(isset($_SESSION['useremail'])){
                    ?>
                    <script>
                        $("#newuser").text("Registration Successfull!");
                        $("#newuser").css({"color":"green"});
                        setTimeout(function() {
                          $('#newuser').fadeOut("slow");
                        }, 2500);
                    </script>
                    <?php
                    if(isset($_SESSION['useremail'])){ ; unset($_SESSION['useremail']);}
                 }

                //  Show delete message after deleted any table data...
                 if(isset($_SESSION['delete'])){
                    ?>
                    <script>
                        $("#newuser").text("<?php echo $_SESSION['delete'] ?>");
                        $("#newuser").css({"color":"red"});
                        setTimeout(function() {
                          $('#newuser').fadeOut("slow");
                        }, 2500);
                    </script>
                    <?php
                    if(isset($_SESSION['delete'])){ ; unset($_SESSION['delete']);}
                 }

                 //  Show Edit message after Edited any table data...
                 if(isset($_SESSION['edit'])){
                    ?>
                    <script>
                        $("#newuser").text("<?php echo $_SESSION['edit'] ?>");
                        $("#newuser").css({"color":"green"});
                        setTimeout(function(){
                            $("#newuser").fadeOut("slow");
                        },3000);
                    </script>
                    <?php
                    if(isset($_SESSION['edit'])){ ; unset($_SESSION['edit']);}
                 }
                 ?>

            <div class="Data">
                
              <!-- pagination start -->
              <?php
                if(isset($_REQUEST['search'])){
                    // pagination of Fiteration with search Value
                    if(isset($_REQUEST['fgender']) || isset($_REQUEST['fhobbies'])){

                        if(isset($_REQUEST['fgender'])){
                            $query = "SELECT * FROM registration WHERE gender LIKE '$fgender' AND (name LIKE '%$searchData%' OR gender LIKE '$searchData' OR hobbies LIKE '%$searchData%') ORDER BY $field $sort";
                        }
                
                        if(isset($_REQUEST['fhobbies'])){
                            $fhobbies = $_REQUEST['fhobbies'];
                            $query = "SELECT * FROM registration WHERE hobbies LIKE '%$fhobbies%' AND (name LIKE '%$searchData%' OR gender LIKE '$searchData' OR hobbies LIKE '%$searchData%') ORDER BY $field $sort";
                        }
                
                        if(isset($_REQUEST['fgender']) && isset($_REQUEST['fhobbies'])){
                            $query = "SELECT * FROM registration WHERE (gender LIKE '$fgender' AND hobbies LIKE '%$fhobbies%') AND (name LIKE '%$searchData%' OR gender LIKE '%$searchData%' OR hobbies LIKE '%$searchData%') ORDER BY $field $sort";
                        }

                        if(isset($_REQUEST['search']) && isset($_REQUEST['fgender']) && isset($_REQUEST['fhobbies'])){
                            $all_sql = "SELECT * FROM registration WHERE (name LIKE '%$searchData%' OR gender LIKE '$searchData' OR hobbies LIKE '%$searchData%') AND gender LIKE '$fgender' AND hobbies LIKE '%$fhobbies%' ORDER BY $field $sort";
                        }
                    }else{
                        $query = "SELECT * FROM registration WHERE name LIKE '%$searchData%' OR gender LIKE '$searchData' OR hobbies LIKE '%$searchData%' ORDER BY $field $sort";
                    }
                }else{
                    // pagination of Fiteration without search Value
                    if(isset($_REQUEST['fgender']) || isset($_REQUEST['fhobbies'])){
                        if(isset($_REQUEST['fgender'])){
                            $query = "SELECT * FROM registration WHERE gender LIKE '$fgender' ORDER BY $field $sort";
                        }
                        if(isset($_REQUEST['fhobbies'])){
                            $query = "SELECT * FROM registration WHERE hobbies LIKE '%$fhobbies%' ORDER BY $field $sort";
                        }
                
                        if(isset($_REQUEST['fgender']) && isset($_REQUEST['fhobbies'])){
                            $query = "SELECT * FROM registration WHERE gender LIKE '$fgender' AND hobbies LIKE '%$fhobbies%' ORDER BY $field $sort";
                         }
                    }else{
                        $query = "SELECT * FROM registration ORDER BY $field $sort";
                    }
                }

                $result1 = mysqli_query($conn,$query);

                // pagination logic
                if(mysqli_num_rows($result) > 0){
                    $totel_row = mysqli_num_rows($result1);
                    $totel_page = ceil($totel_row/$limit);
                    if(isset($_SESSION['']))
                    ?>                    
                    
                    <div class="pagination">
                        <?php
                        // pagination left arrow Logic

                        if(isset($_REQUEST['search']) && isset($_REQUEST['fgender']) && isset($_REQUEST['fhobbies'])){
                            if($page > 1){?>
                                <span class="fl"><a href="display.php?search=<?php echo $searchData; if(isset($_REQUEST['fhobbies'])){ echo "&fhobbies=".$fhobbies;} if(isset($_REQUEST['fgender'])){ echo "&fgender=".$fgender;}?>&page=<?php echo $page-1?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>"><<</a></span><?php 
                             }
                        }

                        elseif(isset($_REQUEST['search']) && isset($_REQUEST['fhobbies'])){
                            if($page > 1){?>
                                <span class="fl"><a href="display.php?search=<?php echo $searchData; if(isset($_REQUEST['fhobbies'])){ echo "&fhobbies=".$fhobbies;} if(isset($_REQUEST['fgender'])){ echo "&fgender=".$fgender;}?>&page=<?php echo $page-1?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>"><<</a></span><?php 
                             }
                        }

                        elseif(isset($_REQUEST['search']) && isset($_REQUEST['fgender'])){
                            if($page > 1){?>
                                <span class="fl"><a href="display.php?search=<?php echo $searchData; if(isset($_REQUEST['fhobbies'])){ echo "&fhobbies=".$fhobbies;} if(isset($_REQUEST['fgender'])){ echo "&fgender=".$fgender;}?>&page=<?php echo $page-1?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>"><<</a></span><?php 
                             }
                        }

                        elseif(isset($_REQUEST['search'])){
                            if($page > 1){?>
                               <span class="fl"><a href="display.php?search=<?php echo $searchData;?>&page=<?php echo $page-1?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>"><<</a></span><?php 
                            }
                        }

                        elseif(isset($_REQUEST['fgender']) && isset($_REQUEST['fhobbies'])){
                            if($page > 1){?>
                                <span class="fl"><a href="display.php?fgender=<?php echo $fgender;?>&fhobbies=<?php echo $fhobbies;?>&page=<?php echo $page-1?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>"><<</a></span><?php 
                             }
                        }

                        elseif(isset($_REQUEST['fgender']) || isset($_REQUEST['fhobbies'])){
                            if($page > 1){?>
                                <span class="fl"><a href="display.php?<?php if(isset($_REQUEST['fgender'])){ echo "&fgender=".$_REQUEST['fgender']; } if(isset($_REQUEST['fhobbies'])){ echo "&fhobbies=".$_REQUEST['fhobbies']; }?>&page=<?php echo $page-1?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>"><<</a></span><?php 
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

                    // Create dynamic pages of pagination  ...
                    for($i=1;$i<=$totel_page;$i++){
                        if($page == $i){
                            $active = "activepage";
                        }else{
                            $active = "";
                        }

                        if(isset($_REQUEST['search']) && isset($_REQUEST['fgender']) && isset($_REQUEST['fhobbies'])){
                            ?><span class="pageaa"><a class="<?php echo $active?>" href="display.php?search=<?php echo $searchData; if(isset($_REQUEST['fhobbies'])){ echo "&fhobbies=".$fhobbies;} if(isset($_REQUEST['fgender'])){ echo "&fgender=".$fgender;}?>&page=<?php echo $i;?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>"><?php echo $i; ?></a></span><?php
                        }

                        elseif(isset($_REQUEST['search']) && isset($_REQUEST['fhobbies']) || (isset($_REQUEST['fgender']))){
                            ?><span class="pageaa"><a class="<?php echo $active?>" href="display.php?<?php if(isset($_REQUEST['search'])){ echo "&search=".$searchData; } if(isset($_REQUEST['fhobbies'])){ echo "&fhobbies=".$fhobbies;} if(isset($_REQUEST['fgender'])){ echo "&fgender=".$fgender;}?>&page=<?php echo $i;?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>"><?php echo $i; ?></a></span><?php
                        }

                        elseif(isset($_REQUEST['search'])){
                            ?><span class="pageaa"><a class="<?php echo $active?>" href="display.php?<?php if(isset($_REQUEST['search'])){ echo "&search=".$searchData; } ?>&page=<?php echo $i;?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>"><?php echo $i; ?></a></span><?php
                        }

                        elseif(isset($_REQUEST['fgender']) && isset($_REQUEST['fhobbies'])){
                            ?><span class="pageaa"><a class="<?php echo $active?>" href="display.php?fgender=<?php echo $fgender;?>&fhobbies=<?php echo $fhobbies;?>&page=<?php echo $i;?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>"><?php echo $i; ?></a></span><?php
                        }

                        elseif(isset($_REQUEST['fgender']) || isset($_REQUEST['fhobbies'])){
                            ?><span class="pageaa"><a class="<?php echo $active?>" href="display.php?<?php if(isset($_REQUEST['fgender'])){ echo "&fgender=".$_REQUEST['fgender']; } if(isset($_REQUEST['fhobbies'])){ echo "&fhobbies=".$_REQUEST['fhobbies']; }?>&page=<?php echo $i;?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>"><?php echo $i; ?></a></span><?php
                        }

                        elseif(isset($_REQUEST['field']) && isset($_REQUEST['sort'])){
                            ?><span class="pageaa"><a class="<?php echo $active?>" href="display.php?field=<?php echo $field;?>&sort=<?php echo $sort;?>&page=<?php echo $i;?>&limit=<?php echo $limit;?>"><?php echo $i; ?></a></span><?php
                        }else{
                            ?><span class="pageaa"><a class="<?php echo $active?>" href="display.php?page=<?php echo $i?>&limit=<?php echo $limit;?>"><?php echo $i; ?></a></span><?php
                        }
                    }
                    
                    ?>
                    <?php
                     // paginaton Right arrow Logic

                    if(isset($_REQUEST['search']) && isset($_REQUEST['fgender']) && isset($_REQUEST['fhobbies'])){
                        if($totel_page>$page){?>
                            <span class="fl"><a href="display.php?search=<?php echo $searchData; if(isset($_REQUEST['fhobbies'])){ echo "&fhobbies=".$fhobbies;} if(isset($_REQUEST['fgender'])){ echo "&fgender=".$fgender;}?>&page=<?php echo $page+1?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>">>></a></span><?php 
                         }
                    }

                    elseif(isset($_REQUEST['search']) && isset($_REQUEST['fhobbies'])){
                        if($totel_page>$page){?>
                            <span class="fl"><a href="display.php?search=<?php echo $searchData; if(isset($_REQUEST['fhobbies'])){ echo "&fhobbies=".$_REQUEST['fhobbies'];}?>&page=<?php echo $page+1?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>">>></a></span><?php 
                         }
                    }

                    elseif(isset($_REQUEST['search']) && isset($_REQUEST['fgender'])){
                        if($totel_page>$page){?>
                            <span class="fl"><a href="display.php?search=<?php echo $searchData; if(isset($_REQUEST['fhobbies'])){ echo "&fhobbies=".$fhobbies;} if(isset($_REQUEST['fgender'])){ echo "&fgender=".$fgender;}?>&page=<?php echo $page+1?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>">>></a></span><?php 
                         }
                    }

                    elseif(isset($_REQUEST['search'])){
                        if($totel_page>$page){?>
                           <span class="fl"><a href="display.php?search=<?php echo $searchData?>&page=<?php echo $page+1?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>">>></a></span><?php 
                        }
                    }

                    elseif(isset($_REQUEST['fgender']) && isset($_REQUEST['fhobbies'])){
                        if($totel_page>$page){?>
                            <span class="fl"><a href="display.php?fgender=<?php echo $fgender?>&fhobbies=<?php echo $fhobbies?>&page=<?php echo $page+1?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>">>></a></span><?php 
                         }
                    }

                    elseif(isset($_REQUEST['fgender']) || isset($_REQUEST['fhobbies'] )){
                        if($totel_page>$page){?>
                            <span class="fl"><a href="display.php?<?php if(isset($_REQUEST['fgender'])){ echo "&fgender=".$_REQUEST['fgender']; } if(isset($_REQUEST['fhobbies'])){ echo "&fhobbies=".$_REQUEST['fhobbies']; }?>&page=<?php echo $page+1?>&field=<?php echo $field;?>&sort=<?php echo $sort;?>&limit=<?php echo $limit;?>">>></a></span><?php 
                         }
                    }

                    elseif(isset($_REQUEST['field']) && isset($_REQUEST['sort'])){
                        if($totel_page>$page){ ?>
                            <span class="fl"><a href="display.php?field=<?php echo $field;?>&sort=<?php echo $sort;?>&page=<?php echo $page+1;?>&limit=<?php echo $limit;?>">>></a></span><?php 
                        }
                    }

                    else{
                        if($totel_page>$page){ ?>
                            <span class="fl"><a href="display.php?page=<?php echo $page+1?>&limit=<?php echo $limit;?>">>></a></span> <?php
                        }
                    }
                    ?>
                </div> <?php
                }
                ?>
             <!-- Pagination End -->

              <!-- Table structure -->
                <table>
                    <tr>
                        <!-- All table Colums -->
                        <th>Table Rows</th>
                        <th><span class="thData"><a href="?field=id&sort=<?php echo $sortOrder; ?><?php if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];}if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];}?>">ID <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=name&sort=<?php echo $sortOrder; ?><?php if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];}if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];} ?>">Name <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=email&sort=<?php echo $sortOrder; ?><?php if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];}if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];} ?>">Email <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=phone&sort=<?php echo $sortOrder; ?><?php if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];}if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];} ?>">Mobile Number <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=gender&sort=<?php echo $sortOrder; ?><?php if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];}if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];} ?>">Gender<?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=dob&sort=<?php echo $sortOrder; ?><?php if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];}if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];} ?>">DOB <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=hobbies&sort=<?php echo $sortOrder; ?><?php if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];}if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];} ?>">Hobbies <?php echo $sortIcon; ?></a></span></th>
                        <th><span class="thData"><a href="?field=image&sort=<?php echo $sortOrder; ?><?php if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];}if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];} ?>">Image <?php echo $sortIcon; ?></a></span></th>
                        <th colspan ="2">ACTIONS</th>
                    </tr>
                    <?php

                    if (mysqli_num_rows($result) > 0) {
                        $number = $offset;

                        // show Data in table ... 
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
                            <td><a href="form.php?field=<?php if(isset($field)){ echo $field; } ?>&sort=<?php if(isset($sort)){ echo $sort; } if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($limit)){ ?>&limit=<?php echo $limit;} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];} if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];}?>&page=<?php echo $page; ?> &id=<?php echo $row["id"]; ?>">Edit</a></td>
                            <td><span><a href="delete.php?field=<?php if(isset($field)){ echo $field; } $_SESSION['deletepath']= $totel_row; ?>&sort=<?php if(isset($sort)){ echo $sort; } if(isset($_REQUEST['search'])){ ?>&search=<?php echo $searchData;} if(isset($limit)){ ?>&limit=<?php echo $limit;} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];} if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];}?>&page=<?php echo $page; ?> &id=<?php echo $row["id"]?>" onclick="return confirm('Are you sure you want to delete this Row?')">Delete</a></span></td>
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


<!-- 1. Invalid images (.php)
2. Show error msg while typing with spaces only
3. show selected option and limit after coming back from inserting data
4. show error msg if email is already exists while inserting and updating data
5. show error msg after deselecting all hobbies// Fixed
6. remove error msg when a valid image is selected (See :- Pictures/Screenshots/Screenshot (5))
7. Do proper validation for mobile number (See :- Pictures/Screenshots/Capture)
8. Don't let submit if any error occurs
9. Showing error after deleting all rows
10.Images should also delete (from upload folder) when deleting rows
11.URL should be proper :-
    http://localhost/Inbound-Webhub/PHP/PHP_CRUD/display.php
    http://localhost/inbound-webhub/php/php_crud/display.php
12 confirm Password validation -->