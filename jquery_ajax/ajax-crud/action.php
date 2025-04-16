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
    $Name = trim(isset($_POST['name']) ? $_POST['name'] : "");
    $Email = trim(isset($_POST['email']) ? $_POST['email'] : "");
    $Password = trim(isset($_POST['password']) ? $_POST['password'] : "");
    $Phone = trim(isset($_POST['mobile']) ? $_POST['mobile'] : "");
    $Gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $Hobbies = implode(",", isset($_POST['hobbies']) ? $_POST['hobbies'] : "");
    $Image = '';

    if($_FILES['image']){
        $targetDir = 'upload/';
        $image = time() . '.' . pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
        $targetFile = $targetDir .$image;
        move_uploaded_file($_FILES["image"]["tmp_name"],$targetFile);
    }

    $insertquery = "INSERT INTO `usersdata`(`name`, `email`, `password`, `phone`, `gender`, `hobbies`) VALUES ('$Name','$Email','$Password','$Phone','$Gender','$Hobbies')";
    $fetchall = mysqli_query($conn, $insertquery);
    if ($fetchall) {
    ?><h4 style="color: green; text-align: center;"><?php echo "New Record Add successfully...!"; ?></h4><?php
    }else{
        ?><h4 style="color: red;"><?php echo "New Record Insert faild...!"; ?></h4><?php
    }
}

// delete operation on ajax request
if (isset($_REQUEST['deleterow'])) {
    $Id = isset($_POST['id']) ? $_POST['id'] : "";

    $deletequery = "DELETE FROM `usersdata` WHERE `id` = $Id";
    $deleterow = mysqli_query($conn, $deletequery);
    
    if($deleterow){
        ?><h4 style="color: red; text-align: center;"><?php echo "Delete successfull...!"; ?></h4><?php
    }else{
        ?><h4 style="color: red;"><?php echo "Delete faild...!"; ?></h4><?php
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
    <form id="editUserForm">
        <input type="hidden" name="id" id="idinput" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="uname" value="<?php echo $row['name']; ?>">

        <label for="email">Email:</label>
        <input type="email" id="uemail" value="<?php echo $row['email']; ?>">

        <label for="password">Password:</label>
        <input type="password" id="upassword" value="<?php echo $row['password']; ?>">

        <label for="mobile">Mobile Number:</label>
        <input type="number" id="umobile" value="<?php echo $row['phone']; ?>">

        <label>Gender:</label>
        <div class="radio-group">
            <label><input type="radio" class="ugender" name="gender" value="Male" <?php if($row['gender']=='Male'){ echo "checked";} ?>> Male</label>
            <label><input type="radio" class="ugender" name="gender" value="Female" <?php if($row['gender']=='Female'){ echo "checked";} ?>> Female</label>
        </div>

        <label>Hobbies:</label>
        <div class="checkbox-group">
            <label><input type="checkbox" class="uhobbie" name="hobbies[]" value="coding" <?php if(in_array("coding", $hobbies)){ echo "checked"; } ?>> coding</label>
            <label><input type="checkbox" class="uhobbie" name="hobbies[]" value="traveling" <?php if(in_array("traveling", $hobbies)){ echo "checked"; } ?>> traveling</label>
            <label><input type="checkbox" class="uhobbie" name="hobbies[]" value="sports" <?php if(in_array("sports", $hobbies)){ echo "checked"; } ?>> sports</label>
            <label><input type="checkbox" class="uhobbie" name="hobbies[]" value="music" <?php if(in_array("music", $hobbies)){ echo "checked"; } ?>> music</label>
        </div>

        <div class="form-buttons">
            <!-- <a href="#" style="text-decoration: none;" class="btn submit-btn">Submit</a> -->
            <button type="button" class="btn submit-btn" onclick="updateData()">Submit</button>
            <button type="button" class="btn close-btn" onclick="closeeditform()" id="editclosebtn">Close</button>
        </div>
    </form>
    <?php
 }

 if (isset($_REQUEST['updateData'])) {
    $Id = $_POST["id"];
    $Name = $_POST["name"];
    $Email = $_POST['email'];
    $Password = md5($_POST['password']);
    $Number = $_POST['mobile'];
    $Gender = $_POST['gender'];
    $Hobbies = implode(",", $_POST['hobbies']);

    $sql = "UPDATE `usersdata` SET `name`='$Name',`email`='$Email',
        `password`='$Password',`phone`='$Number',`gender`='$Gender',`hobbies`='$Hobbies' WHERE `id`=$Id";
    
    $result = mysqli_query($conn,$sql);

    if($result){
        ?><h4 style="color: red; text-align: center;"><?php echo "Users Data Edited Successfully...!"; ?></h4><?php
    }else{
        ?><h4 style="color: red;"><?php echo "Update faild...!"; ?></h4><?php
    }
}
 ?>