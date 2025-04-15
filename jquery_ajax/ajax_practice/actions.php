<?php
include 'conn.php';

if(isset($_REQUEST['action']))
{
    $allDataquery = "SELECT * FROM ajaxtest";
    $fetchall = mysqli_query($conn, $allDataquery);
    $result_array = [];

    if(mysqli_num_rows($fetchall) > 0)
    {
        foreach($fetchall as $row)
        {
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else
    {
        echo $return = "<h4>No Record Found</h4>";
    }
}else{
    echo "condition False";
}

// // insert part
// $Name = isset($_POST['name']) ? $_POST['name'] : "";
// $Email = isset($_POST['email']) ? $_POST['email'] : "";

// $sql = "INSERT INTO `ajaxtest`(`name`, `email`) VALUES ('$Name','$Email')";
// $result = mysqli_query($conn,$sql);

// if($result){
//     echo "New Row Add Successfully...!";
// }else{
//     echo "Insert Faild";
// }
