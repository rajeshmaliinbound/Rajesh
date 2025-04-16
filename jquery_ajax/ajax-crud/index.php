<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Display Table</title>
    <link rel="stylesheet" type="text/css" href="astyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="ascript.js"></script>
    <style>
        #usereditForm {
            display: none;
            position: absolute;
            top: 104px;
            left: 400px;
            width: 400px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 20px 25px;
            z-index: 1000;
        }

        #usereditForm h3 {
            margin: 0 0 20px;
            font-size: 20px;
            text-align: center;
            color: #333;
        }

        #usereditForm label {
            font-size: 13px;
            color: #555;
            margin-bottom: 4px;
            display: block;
            font-weight: 500;
        }

        #usereditForm input[type="text"],
        #usereditForm input[type="email"],
        #usereditForm input[type="password"],
        #usereditForm input[type="number"] {
            width: calc(100% - 20px);
            padding: 6px 10px;
            font-size: 13px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-left: 10px;
            margin-right: 10px;
            transition: all 0.2s ease;
        }

        #usereditForm input:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="dashboard-header">
            <button class="add-btn" id="openForm">+ Add User</button>
            <h2>All Users</h2>
        </div>
        <!-- show add new user message -->
        <div class="show-insert-msg"></div>
        <!-- <div class="show-delete-msg"></div> -->

        <!-- start create table structure-->
        <div class="allDatable"></div>
        <!-- End create table -->

        <div id="usereditForm"></div>

        <!-- Add user Form Start-->
        <div id="userForm">
            <h3>Add User</h3>
            <form id="addUserForm" aria-hidden="true" tabindex="-1">
                <label for="name">Name:</label>
                <input type="text" id="iname">

                <label for="email">Email:</label>
                <input type="email" id="iemail">

                <label for="password">Password:</label>
                <input type="password" id="ipassword" >

                <label for="mobile">Mobile Number:</label>
                <input type="number" id="imobile">

                <label>Gender:</label>
                <div class="radio-group">
                    <label><input type="radio" class="igender" name="gender" value="Male"> Male</label>
                    <label><input type="radio" class="igender" name="gender" value="Female"> Female</label>
                </div>

                <label>Hobbies:</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" class="ihobbie" name="hobbies[]" value="coding"> coding</label>
                    <label><input type="checkbox" class="ihobbie" name="hobbies[]" value="traveling"> traveling</label>
                    <label><input type="checkbox" class="ihobbie" name="hobbies[]" value="sports"> sports</label>
                    <label><input type="checkbox" class="ihobbie" name="hobbies[]" value="music"> music</label>
                </div>

                <label for="file">Select File</label>
                <input type="file" id="iFile" name="image">

                <div class="form-buttons">
                    <!-- <a href="#" style="text-decoration: none;" class="btn submit-btn">Submit</a> -->
                    <button type="button" class="btn submit-btn" onclick="insertData()">Submit</button>
                    <button type="button" class="btn close-btn" id="closeForm">Close</button>
                </div>
            </form>
        </div>
        <!-- Add user Form End-->
    </div>
    <script>
        $('#openForm').click(function(){
            $("#addUserForm")[0].reset();
            $("#usereditForm").fadeOut();
            $('#userForm').fadeToggle();
        });
        $('#closeForm').click(function() {
            $('#userForm').fadeOut();
        });
    </script>
</body>

</html>