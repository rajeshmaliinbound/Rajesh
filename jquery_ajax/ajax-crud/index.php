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

        #show-msg{
            height: 22px;
            text-align: center;
            margin: 10px;
            color: green;
        }

        #show-msg h5{
            padding: 0px;
            margin: 0px;
            font-size: 17px;
        }

        .table-actions{
            display: flex;
            padding: 5px;
        }

        .search-data input{
            width: 250px;
            padding: 5px;
            border: 1px solid green;
            border-radius: 5px;
            margin-left: 22%;
        }

        .row-number{
            margin-left: 25%;
        }

        .filteration{
            margin-left: 70px;
        }

        .filteration h6{
            display: inline;
            font-size: 17px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="dashboard-header">
            <button class="add-btn" id="openForm">+ Add User</button>
            <h2>All Users</h2>
        </div>

        <!-- Search, rows-select or Filteration structure -->
        <div class="table-actions">

            <!-- for search -->
            <div class="search-data">
               <input type="text" id="search-input" placeholder="search by name, gender or hobbies">
            </div>

            <!-- for select rows limit -->
            <div class="row-number">
            Rows: <select id="limitdata">
                   <option value="">Select Rows</option>
                   <option value="5">5</option>
                   <option value="10">10</option>
                   <option value="15">15</option>
                   <option value="20">20</option>
                   <option value="30">30</option>
                   <option value="50">50</option>
                </select>
            </div>

            <!-- for filteration by gender or hobbies  -->
            <div class="filteration">
                <h6>Filteration: </h6>
                <select id="fgender">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <select id="fhobbies">
                    <option value="">Select Hobbies</option>
                    <option value="coding">coding</option>
                    <option value="traveling">traveling</option>
                    <option value="sports">sports</option>
                    <option value="music">music</option>
                </select>
            </div>
        </div>

        <!-- show message for add new user, Edit user, delete user -->
        <div id="show-msg"></div>
        
        <!--Table structure-->
        <div class="allDatable"></div>

        <!-- edit form -->
        <div id="usereditForm"></div>

        <!-- Add New User Form Start-->
        <div id="userForm">
            <h3>Add User</h3>
            <form id="addUserForm" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" name="iname">

                <label for="email">Email:</label>
                <input type="email" name="iemail">

                <label for="password">Password:</label>
                <input type="password" name="ipassword">

                <label for="mobile">Mobile Number:</label>
                <input type="number" name="imobile">

                <label>Gender:</label>
                <div class="radio-group">
                    <label><input type="radio" name="igender" value="Male"> Male</label>
                    <label><input type="radio" name="igender" value="Female"> Female</label>
                </div>

                <label>Hobbies:</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="ihobbies[]" value="coding"> coding</label>
                    <label><input type="checkbox" name="ihobbies[]" value="traveling"> traveling</label>
                    <label><input type="checkbox" name="ihobbies[]" value="sports"> sports</label>
                    <label><input type="checkbox" name="ihobbies[]" value="music"> music</label>
                </div>

                <label>Select File</label>
                <input type="file" value="" name="iimage">

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
        // start Insert Data using ajax request
        function insertData(){
            var insertform = "action";
            var form = $('#addUserForm')[0];
            var formData = new FormData(form);
            formData.append('insert', 'insertform');
            $.ajax({
                url: "action.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(insertreturn){
                    $("#show-msg").html(insertreturn);
                    $('#userForm').fadeOut();
                    getdata();
                    setTimeout(function(){
                        $(".insertmsg").fadeOut("slow");
                    },1000);
                }
            });
        }
        // End Insert Data using ajax request

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