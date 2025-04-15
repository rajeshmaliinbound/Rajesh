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
                        <button class="btn edit-btn" value="<?php echo $row['id']; ?>">Edit</button>
                        <button class="btn delete-btn" onclick="rowdlt(<?php echo $row['id'] ?>)">Delete</button>
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

    $insertquery = "INSERT INTO `usersdata`(`name`, `email`, `password`, `phone`, `gender`, `hobbies`) VALUES ('$Name','$Email','$Password','$Phone','$Gender','$Hobbies')";
    $fetchall = mysqli_query($conn, $insertquery);
    if ($fetchall) {
    ?><h4 style="color: green; text-align: center;"><?php echo "New Record Add successfully...!"; ?></h4><?php
    } else {
           ?><h4 style="color: red;"><?php echo "New Record Insert faild...!"; ?></h4><?php
          }
}
 ?>