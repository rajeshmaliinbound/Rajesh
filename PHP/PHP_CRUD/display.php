<?php
      include 'connection.php';
      $sql = "SELECT * FROM `registration`";
      $result = mysqli_query($conn,$sql);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="contaiiner">
        <div class="header">
            <h1>All Registered Users</h1>
            <span class="btn"><a href="form.php">Add User</a></span>

            <div class="Data">
                <table>
                    <tr>
                        <th>TABLE ROW.</th>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PASSWORD</th>
                        <th>MOBILE NUMBER</th>
                        <th>GENDER</th>
                        <th>DOB</th>
                        <th>HOBBIES</th>
                        <th>IMAGE</th>
                        <th colspan ="2">ACTIONS</th>
                    </tr>
                    <?php
                    $number = 1;
                    while($row = mysqli_fetch_assoc($result))
                    {
                        ?>
                        <tr>
                        <td><?php echo $number;?></td>
                        <?php $number = $number+1;?>
                        
                        <td><?php echo $row["id"];?></td>
                        <td><?php echo $row["name"];?></td>
                        <td><?php echo $row["email"];?></td>
                        <td><?php echo $row["password"];?></td>
                        <td><?php echo $row["phone"];?></td>
                        <td><?php echo $row["gender"];?></td>
                        <td><?php echo $row["hobbies"];?></td>
                        <td><?php echo $row["image"];?></td>
                        <td>
                            <img width="50" src="upload/<?php echo $row["image"] ?>" alt="Empty">
                        </td>
                        <td><a href="edit.php?id=<?php echo $row["id"]?>">Edit</a></td>
                        <td><span><a href="delete.php?id=<?php echo $row["id"]?>">Delete</a></span></td>
                        </tr><?php
                    }
                    ?>                   
                </table>
           </div>
        </div>
    </div>
</body>
</html>