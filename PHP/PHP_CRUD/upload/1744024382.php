
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
 <body>    <div class="contaiiner">
        <div class="header">
            <h1>All Registered Users</h1>

            <!-- Filteration Structure Start -->
            <div style="margin-left: 60%; display: flex; align-items: center; justify-content: right;">
                <h2 style="padding-right: 10px; margin-top:10px;">Filteration:</h2>
                <select class="filteration" id="fgender" style="width: 25%;">
                <option value="" >Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female" >Female</option>
                </select>

                <select class="filteration" id="fhobbies" style="width: 30%; margin-left: 5px;">
                <option value="" >Select Hobbies</option>
                <option value="Coding" >Coding</option>
                <option value="traveling" >traveling</option>
                <option value="sports" >sports</option>
                <option value="music" >music</option>
                <option value="art" >art</option>
                </select>
            </div>
             <!-- filteration Query -->
            <script>
                $(document).ready(function(){    
                    $("#fgender").change(function(){
                        let genderVal = $(this).val();
                        if(!genderVal== ""){
                            window.location.href="display.php?&limit=5&fgender=" +genderVal;
                        }else{
                            window.location.href="display.php?&limit=5";
                        }
                    });

                    $("#fhobbies").change(function(){
                        let hobbieVal = $(this).val();
                        if(!hobbieVal== ""){
                            window.location.href="display.php?&limit=5&fhobbies=" +hobbieVal;
                        }else{
                            window.location.href="display.php?&limit=5";
                        }
                    });
                });
            </script>
            <!-- Filteration Structure End -->

            <span class="btn"><a href="form.php">Add User</a></span>
             <form action="display.php" method="get" class="srcForm">
                <input type="text" name="search" value="" placeholder="Search by Name, Gender or Hobbies" id="data" require>
                <input type="hidden" name="limit" value="5">
                <input type="hidden" name="" value="">
                <input type="hidden" name="" value="">
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
                    Select Number of Rows:<select name="" id="rows" style="width: 4%; margin-top: 10px; margin-bottom: 0px;">
                        <option value="5" >5</option>
                        <option value="10" >10</option>
                        <option value="15" >15</option>
                        <option value="20" >20</option>
                        <option value="25" >25</option>
                        <option value="30" >30</option>
                        <option value="200" >30</option>
                    </select>
                </div>
                <script>
                    $(document).ready(function(){
                        var limit = $("#rows").val();
                        $("#rows").change(function(){
                            limit = $(this).val();
                            window.location.href="display.php?&limit=" +limit;
                        });
                    });
                </script> 
                
                <!-- Registration,Edit,Delete Message show -->
                <div style="color: Green;"><h4 id="newuser"></h4></div>
                 
            <div class="Data">
                
              <!-- pagination start -->
                                  
                    <div class="pagination">
                        
                    <span class="pageaa"><a class="activepage" href="display.php?page=1&limit=5">1</a></span><span class="pageaa"><a class="" href="display.php?page=2&limit=5">2</a></span><span class="pageaa"><a class="" href="display.php?page=3&limit=5">3</a></span><span class="pageaa"><a class="" href="display.php?page=4&limit=5">4</a></span><span class="pageaa"><a class="" href="display.php?page=5&limit=5">5</a></span><span class="pageaa"><a class="" href="display.php?page=6&limit=5">6</a></span><span class="pageaa"><a class="" href="display.php?page=7&limit=5">7</a></span>                                                <span class="fl"><a href="display.php?page=2&limit=5">>></a></span>                 </div>              <!-- Pagination End -->

              <!-- Table structure -->
                <table>
                    <tr>
                        <!-- All table Colums -->
                        <th>Table Rows</th>
                        <th><span class="thData"><a href="?field=id&sort=desc">ID ⇧</a></span></th>
                        <th><span class="thData"><a href="?field=name&sort=desc">Name ⇧</a></span></th>
                        <th><span class="thData"><a href="?field=email&sort=desc">Email ⇧</a></span></th>
                        <th><span class="thData"><a href="?field=phone&sort=desc">Mobile Number ⇧</a></span></th>
                        <th><span class="thData"><a href="?field=gender&sort=desc">Gender⇧</a></span></th>
                        <th><span class="thData"><a href="?field=dob&sort=desc">DOB ⇧</a></span></th>
                        <th><span class="thData"><a href="?field=hobbies&sort=desc">Hobbies ⇧</a></span></th>
                        <th><span class="thData"><a href="?field=image&sort=desc">Image ⇧</a></span></th>
                        <th colspan ="2">ACTIONS</th>
                    </tr>
                                                <tr>
                                                        <td>1</td>                            
                            <td>16</td>
                            <td>Laurel Stuart</td>
                            <td>kovulij@mailinator.com</td>
                            <td>+1 (968) 593-3262</td>
                            <td>Female</td>
                            <td>2004-06-02</td>
                            <td>Coding,sports,music,art</td>
                            <td>
                                <img width="50" src="upload/1743066948.jfif" alt="Empty">
                            </td>
                            <td><a href="form.php?field=id&sort=asc&limit=5&page=1 &id=16">Edit</a></td>
                            <td><span><a href="delete.php?field=id&sort=asc&page=1 &id=16" onclick="return confirm('Are you sure you want to delete this Row?')">Delete</a></span></td>
                            </tr>                            <tr>
                                                        <td>2</td>                            
                            <td>19</td>
                            <td>Emily Martinez</td>
                            <td>husuwydo@mailinator.com</td>
                            <td>+1 (104) 667-8182</td>
                            <td>Female</td>
                            <td>1984-03-23</td>
                            <td>Coding,sports,music,art</td>
                            <td>
                                <img width="50" src="upload/1743066991.jpg" alt="Empty">
                            </td>
                            <td><a href="form.php?field=id&sort=asc&limit=5&page=1 &id=19">Edit</a></td>
                            <td><span><a href="delete.php?field=id&sort=asc&page=1 &id=19" onclick="return confirm('Are you sure you want to delete this Row?')">Delete</a></span></td>
                            </tr>                            <tr>
                                                        <td>3</td>                            
                            <td>20</td>
                            <td>Paloma Lindsey</td>
                            <td>veku@mailinator.com</td>
                            <td>+1 (763) 844-5824</td>
                            <td>Female</td>
                            <td>1985-11-16</td>
                            <td>Coding,sports,music,art</td>
                            <td>
                                <img width="50" src="upload/1743067002.jfif" alt="Empty">
                            </td>
                            <td><a href="form.php?field=id&sort=asc&limit=5&page=1 &id=20">Edit</a></td>
                            <td><span><a href="delete.php?field=id&sort=asc&page=1 &id=20" onclick="return confirm('Are you sure you want to delete this Row?')">Delete</a></span></td>
                            </tr>                            <tr>
                                                        <td>4</td>                            
                            <td>30</td>
                            <td>Kuame Bolton</td>
                            <td>denobad@mailinator.com</td>
                            <td>+1 (615) 707-2717</td>
                            <td>Male</td>
                            <td>1996-06-15</td>
                            <td>Coding,music</td>
                            <td>
                                <img width="50" src="upload/1743156449.jfif" alt="Empty">
                            </td>
                            <td><a href="form.php?field=id&sort=asc&limit=5&page=1 &id=30">Edit</a></td>
                            <td><span><a href="delete.php?field=id&sort=asc&page=1 &id=30" onclick="return confirm('Are you sure you want to delete this Row?')">Delete</a></span></td>
                            </tr>                            <tr>
                                                        <td>5</td>                            
                            <td>31</td>
                            <td>Bryar Santiago</td>
                            <td>mulavel@mailinator.com</td>
                            <td>+1 (686) 809-9198</td>
                            <td>Male</td>
                            <td>1991-12-02</td>
                            <td>Coding,sports</td>
                            <td>
                                <img width="50" src="upload/1743156460.jpg" alt="Empty">
                            </td>
                            <td><a href="form.php?field=id&sort=asc&limit=5&page=1 &id=31">Edit</a></td>
                            <td><span><a href="delete.php?field=id&sort=asc&page=1 &id=31" onclick="return confirm('Are you sure you want to delete this Row?')">Delete</a></span></td>
                            </tr>                </table>
           </div>
        </div>
    </div>
</body>
</html>