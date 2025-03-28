<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
    <style>
        form button{
            margin-right: 50px;
            margin-top: 30px;
            color: blue;
            padding: 5px;
        }

        img{
            border: 1px solid gray;
            padding: 1px;
            border-radius: 2px;
            margin-right: 60px;
        }

    </style>
</head>
<body>

  <?php 
  include 'connection.php';
  $id = $_GET["id"];
  
  $sql = "SELECT * FROM `student` WHERE `id`=$id";
  $result = mysqli_query($conn,$sql);

  $row = mysqli_fetch_assoc($result);
  ?>

    <div class="container">
        <div class="main">
            <form action="update.php" method="post" enctype="multipart/form-data">
                <h2>Edit Form</h2>
                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $row['name'];?>"><br><br>

                <label for="name">Email:</label>
                <input type="email" name="email" value="<?php echo $row['email'];?>"><br><br>

                <label for="name">Password:</label>
                <input type="password" name="password" value="<?php echo $row['password'];?>"><br><br>

                <label for="name">Gender:</label>
                 <input type="radio" name="gender" value="Male" 
                    <?php
                    if($row['gender']=='Male')
                    {
                        echo "checked";
                    }?>>Male

                 <input type="radio" name="gender" value="Female"
                    <?php
                    if($row['gender']=='Female')
                    {
                        echo "checked";
                    }
                    ?>>Female<br><br>

                 <input type="file" name="profile">
                 <input type="hidden" name="oldfile" value="<?php echo $row['image'];?>">
                 <img width="50" src="upload/<?php echo $row["image"] ?>" alt="Empty">

                 <button type="submit" value="submit">submit</button>
            </form>
        </div>
    </div>
</body>
</html>