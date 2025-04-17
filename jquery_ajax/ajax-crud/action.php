<?php
include 'dbconn.php';

//fetch all records from database & show all records operation on ajax request
if (isset($_REQUEST['allrecords'])) {
    $allDataquery = "SELECT * FROM `usersdata`";
    $fetchall = mysqli_query($conn, $allDataquery);
    $result_array = [];

    if (mysqli_num_rows($fetchall) > 0) {
?>
        <table class="tabledata">
            <tr>
                <th>Rows</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Gender</th>
                <th>Hobbies</th>
                <th>Image</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            $number = 0;
            foreach ($fetchall as $row) { ?>
                <?php $number = $number+1 ?>
                <tr>
                    <td><?php echo $number ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td><?php echo $row['hobbies'] ?></td>
                    <td>
                       <img width="50" src="upload/<?php echo $row["image"] ?>" alt="Empty">
                    </td>
                    <td>
                        <button class="btn edit-btn" onclick="editdata(<?php echo $row['id'] ?>)">Edit</button>
                        <button class="btn delete-btn" onclick="deletedata(<?php echo $row['id'] ?>)">Delete</button>
                    </td>
                </tr>
            <?php }
            ?>
        </table>
    <?php
    }else{
        ?>
        <table class="tabledata">
            <tr>
                <th>Rows</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Gender</th>
                <th>Hobbies</th>
                <th>Action</th>
            </tr>
            <tr>
                <td colspan="7" style="text-align: center;">Record Not Found</td>
            </tr>
        </table>
        <?php
    }
}

// insert operation on ajax request
if (isset($_REQUEST['insert'])) {
    $Name = trim(isset($_POST['iname']) ? $_POST['iname'] : "");
    $Email = trim(isset($_POST['iemail']) ? $_POST['iemail'] : "");
    $Password = trim(isset($_POST['ipassword']) ? $_POST['ipassword'] : "");
    $Phone = trim(isset($_POST['imobile']) ? $_POST['imobile'] : "");
    $Gender = isset($_POST['igender']) ? $_POST['igender'] : "";
    $Hobbies = implode(",", isset($_POST['ihobbies']) ? $_POST['ihobbies'] : "");
    $image = '';

    if($_FILES['iimage']){
        $targetDir = 'upload/';
        $image = time() . '.' . pathinfo($_FILES["iimage"]["name"],PATHINFO_EXTENSION);
        $targetFile = $targetDir .$image;
        move_uploaded_file($_FILES["iimage"]["tmp_name"],$targetFile);
    }

    $insertquery = "INSERT INTO `usersdata`(`name`, `email`, `password`, `phone`, `gender`, `hobbies`, `image`) VALUES ('$Name','$Email','$Password','$Phone','$Gender','$Hobbies','$image')";
    $fetchall = mysqli_query($conn, $insertquery);
    if ($fetchall) {
    ?><h4 style="text-align: center;" class="insertmsg"><?php echo "New Record Add successfully...!"; ?></h4><?php
    }else{
        ?><h4 style="color: red; text-align: center;" class="insertmsg"><?php echo "New Record Insert faild...!"; ?></h4><?php
    }
}

// delete operation on ajax request
if (isset($_REQUEST['deleterow'])) {
    $Id = isset($_POST['id']) ? $_POST['id'] : "";

    //find image query 
    $imgquery = "SELECT image FROM `usersdata` WHERE `id` = $Id";
    $result = mysqli_query($conn, $imgquery);
    $imgrow = mysqli_fetch_assoc($result);

    if($imgrow){
        $imagePath = $imgrow['image'];// find image from database 

        $deletequery = "DELETE FROM `usersdata` WHERE `id` = $Id";
        $deleterow = mysqli_query($conn, $deletequery);

        if($deleterow){
            $imageFullPath = 'upload/' . $imagePath;

            if (file_exists($imageFullPath)) { // unlink image from upload folder
                unlink($imageFullPath);
            }
            ?><h4 style="color: green; text-align: center;" class="deletemsg"><?php echo "Delete successfull...!"; ?></h4><?php
        }else{
            ?><h4 style="color: red;" class="deletemsg"><?php echo "Delete faild...!"; ?></h4><?php
        }
    }
}

// Edit operation on ajax request
if (isset($_REQUEST['editrow'])) {
    $Id = isset($_POST['id']) ? $_POST['id'] : "";

    $sql = "SELECT * FROM `usersdata` WHERE `id`=$Id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $hobbies = explode(",", $row['hobbies']);
    ?>
    <h3>Edit User</h3>
    <form id="editUserForm" enctype="multipart/form-data">
        <input type="hidden" name="uid" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="uname" value="<?php echo $row['name']; ?>">

        <label for="email">Email:</label>
        <input type="email" name="uemail" value="<?php echo $row['email']; ?>">

        <label for="password">Password:</label>
        <input type="password" name="upassword" value="<?php echo $row['password']; ?>">

        <label for="mobile">Mobile Number:</label>
        <input type="number" name="umobile" value="<?php echo $row['phone']; ?>">

        <label>Gender:</label>
        <div class="radio-group">
            <label><input type="radio" name="ugender" value="Male" <?php if($row['gender']=='Male'){ echo "checked";} ?>> Male</label>
            <label><input type="radio" name="ugender" value="Female" <?php if($row['gender']=='Female'){ echo "checked";} ?>> Female</label>
        </div>

        <label>Hobbies:</label>
        <div class="checkbox-group">
            <label><input type="checkbox" name="uhobbies[]" value="coding" <?php if(in_array("coding", $hobbies)){ echo "checked"; } ?>> coding</label>
            <label><input type="checkbox" name="uhobbies[]" value="traveling" <?php if(in_array("traveling", $hobbies)){ echo "checked"; } ?>> traveling</label>
            <label><input type="checkbox" name="uhobbies[]" value="sports" <?php if(in_array("sports", $hobbies)){ echo "checked"; } ?>> sports</label>
            <label><input type="checkbox" name="uhobbies[]" value="music" <?php if(in_array("music", $hobbies)){ echo "checked"; } ?>> music</label>
        </div>

        <label>Select File</label>
        <input type="file" value="" name="uimage">
        <input type="hidden" name="hiddenimage" value="<?php echo $row['image']; ?>">
        <div style="margin: 5px;">
            <img width="50" src="upload/<?php echo $row["image"] ?>" alt="Empty">
        </div>
        
        <div class="form-buttons">
            <!-- <a href="#" style="text-decoration: none;" class="btn submit-btn">Submit</a> -->
            <button type="button" class="btn submit-btn" onclick="updateData()">Submit</button>
            <button type="button" class="btn close-btn" onclick="closeeditform()" id="editclosebtn">Close</button>
        </div>
    </form>
    <?php
 }


//  Update user Data
 if (isset($_REQUEST['editupdate'])) {
    $Id = isset($_POST['uid']) ? $_POST['uid'] : "";
    $Name = trim(isset($_POST['uname']) ? $_POST['uname'] : "");
    $Email = trim(isset($_POST['uemail']) ? $_POST['uemail'] : "");
    $Password = trim(isset($_POST['upassword']) ? $_POST['upassword'] : "");
    $Phone = trim(isset($_POST['umobile']) ? $_POST['umobile'] : "");
    $Gender = isset($_POST['ugender']) ? $_POST['ugender'] : "";
    $Hobbies = implode(",", isset($_POST['uhobbies']) ? $_POST['uhobbies'] : "");
    $image = isset($_POST['hiddenimage']) ? $_POST['hiddenimage'] : "";

    if(!empty($_FILES['uimage']['name'])){
        $targetDir = 'upload/';
        if(!is_dir($targetDir))
        {
            $targetDir = mkdir($targetDir, 0777, true);
        }
    
        $image = time() . '.' . pathinfo($_FILES["uimage"]["name"],PATHINFO_EXTENSION);
        $targetFile = $targetDir .$image;
        move_uploaded_file($_FILES["uimage"]["tmp_name"],$targetFile);
     }

    $sql = "UPDATE `usersdata` SET `name`='$Name',`email`='$Email',
        `password`='$Password',`phone`='$Phone',`gender`='$Gender',`hobbies`='$Hobbies',`image`='$image' WHERE `id`=$Id";
    
    $result = mysqli_query($conn,$sql);

    if($result){
        ?><h4 style="color: green; text-align: center;" class="edittmsg"><?php echo "User Data Edited Successfully...!"; ?></h4><?php
    }else{
        ?><h4 style="color: red;text-align: center;" class="edittmsg"><?php echo "Update faild...!"; ?></h4><?php
    }
}

//fetch all records from database & show all records operation on ajax request
if (isset($_REQUEST['search'])) {
    $searchData = trim(isset($_POST['search']) ? $_POST['search'] : "");
    echo $searchData;
    exit;
    $allDataquery = "SELECT * FROM `usersdata`";
    $fetchall = mysqli_query($conn, $allDataquery);
    $result_array = [];

    if (mysqli_num_rows($fetchall) > 0) {
?>
        <table class="tabledata">
            <tr>
                <th>Rows</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Gender</th>
                <th>Hobbies</th>
                <th>Image</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            $number = 0;
            foreach ($fetchall as $row) { ?>
                <?php $number = $number+1 ?>
                <tr>
                    <td><?php echo $number ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td><?php echo $row['hobbies'] ?></td>
                    <td>
                       <img width="50" src="upload/<?php echo $row["image"] ?>" alt="Empty">
                    </td>
                    <td>
                        <button class="btn edit-btn" onclick="editdata(<?php echo $row['id'] ?>)">Edit</button>
                        <button class="btn delete-btn" onclick="deletedata(<?php echo $row['id'] ?>)">Delete</button>
                    </td>
                </tr>
            <?php }
            ?>
        </table>
    <?php
    }else{
        ?>
        <table class="tabledata">
            <tr>
                <th>Rows</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Gender</th>
                <th>Hobbies</th>
                <th>Action</th>
            </tr>
            <tr>
                <td colspan="7" style="text-align: center;">Record Not Found</td>
            </tr>
        </table>
        <?php
    }
}
 ?>