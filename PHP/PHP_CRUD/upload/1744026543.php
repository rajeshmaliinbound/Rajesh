
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
            <span class="btn"><a href="form.php">Add User</a></span>
             <form action="display.php" method="post" class="srcForm">
                <input type="text" name="search" value="" placeholder="Search by Name, Gender or Hobbies" id="data" require>
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
                                    
                    <div class="pagination">
                                               
                    <span class="pageaa"><a class="activepage" href="display.php?page=1">1</a></span><span class="pageaa"><a class="" href="display.php?page=2">2</a></span><span class="pageaa"><a class="" href="display.php?page=3">3</a></span><span class="pageaa"><a class="" href="display.php?page=4">4</a></span>                                            <span class="fl"><a href="display.php?page=2">>></a></span>                 </div>              <!-- Pagination End -->

                <table>
                    <tr>
                        <th>Table Rows</th>
                        <th><span class="thData"><a href="?field=id&sort=desc">ID ⇧</a></span></th>
                        <th><span class="thData"><a href="?field=name&sort=desc">Name ⇧</a></span></th>
                        <th><span class="thData"><a href="?field=email&sort=desc">Email ⇧</a></span></th>
                        <th><span class="thData"><a href="?field=password&sort=desc">Password ⇧</a></span></th>
                        <th><span class="thData"><a href="?field=phone&sort=desc">Mobile Number ⇧</a></span></th>
                        <th><span class="thData"><a href="?field=gender&sort=desc">Gender ⇧</a></span></th>
                        <th><span class="thData"><a href="?field=dob&sort=desc">DOB ⇧</a></span></th>
                        <th><span class="thData"><a href="?field=hobbies&sort=desc">Hobbies ⇧</a></span></th>
                        <th><span class="thData"><a href="?field=image&sort=desc">Image ⇧</a></span></th>
                        <th colspan ="2">ACTIONS</th>
                    </tr>
                                                <tr>
                                                        <td>1</td>                            
                            <td>6</td>
                            <td>Karan Singh</td>
                            <td>dodiya@gmail.com</td>
                            <td>9c5f44e77de0</td>
                            <td>7284018094</td>
                            <td>Male</td>
                            <td>2007-03-26</td>
                            <td>traveling,sports</td>
                            <td>
                                <img width="50" src="upload/1742994137.jfif" alt="Empty">
                            </td>
                            <td><a href="form.php?id=6">Edit</a></td>
                            <td><span><a href="delete.php?id=6" onclick="return confirm('Are you sure you want to delete this Row?')">Delete</a></span></td>
                            </tr>                            <tr>
                                                        <td>2</td>                            
                            <td>9</td>
                            <td>Harsha Chawariya</td>
                            <td>harsha11@gmail.com</td>
                            <td>7925583287a4</td>
                            <td>7284018094</td>
                            <td>Female</td>
                            <td>2002-12-07</td>
                            <td>Coding,traveling,art</td>
                            <td>
                                <img width="50" src="upload/1742994156.jpg" alt="Empty">
                            </td>
                            <td><a href="form.php?id=9">Edit</a></td>
                            <td><span><a href="delete.php?id=9" onclick="return confirm('Are you sure you want to delete this Row?')">Delete</a></span></td>
                            </tr>                            <tr>
                                                        <td>3</td>                            
                            <td>12</td>
                            <td>Karan Singh</td>
                            <td>harsha11@gmail.com</td>
                            <td>eda0d295f1af</td>
                            <td>7284018094</td>
                            <td>Male</td>
                            <td>2005-07-15</td>
                            <td>traveling,sports</td>
                            <td>
                                <img width="50" src="upload/1742994196.jpg" alt="Empty">
                            </td>
                            <td><a href="form.php?id=12">Edit</a></td>
                            <td><span><a href="delete.php?id=12" onclick="return confirm('Are you sure you want to delete this Row?')">Delete</a></span></td>
                            </tr>                            <tr>
                                                        <td>4</td>                            
                            <td>13</td>
                            <td>Vikash </td>
                            <td>vikash@gmail.com</td>
                            <td>1e5c49f0e1e4</td>
                            <td>8973486200</td>
                            <td>Male</td>
                            <td>1997-02-12</td>
                            <td>sports,music,art</td>
                            <td>
                                <img width="50" src="upload/1742994221.jfif" alt="Empty">
                            </td>
                            <td><a href="form.php?id=13">Edit</a></td>
                            <td><span><a href="delete.php?id=13" onclick="return confirm('Are you sure you want to delete this Row?')">Delete</a></span></td>
                            </tr>                            <tr>
                                                        <td>5</td>                            
                            <td>14</td>
                            <td>Urielle Ball</td>
                            <td>qyliduvaq@mailinator.com</td>
                            <td>f3ed11bbdb94</td>
                            <td>+1 (819) 595-4549</td>
                            <td>Male</td>
                            <td>1984-02-05</td>
                            <td>Coding,traveling,music</td>
                            <td>
                                <img width="50" src="upload/1743066908.jfif" alt="Empty">
                            </td>
                            <td><a href="form.php?id=14">Edit</a></td>
                            <td><span><a href="delete.php?id=14" onclick="return confirm('Are you sure you want to delete this Row?')">Delete</a></span></td>
                            </tr>                </table>
           </div>
        </div>
    </div>
</body>
</html>