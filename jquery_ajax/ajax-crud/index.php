<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Display Table</title>
    <link rel="stylesheet" type="text/css" href="astyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="dashboard-header">
            <button class="add-btn" id="openForm">+ Add User</button>
            <h2>All Users</h2>
        </div>
        <!-- show add new user message -->
        <div class="showinsert"></div>

         <!-- start create table structure-->
        <div class="allDatable"></div>
        <!-- End create table -->

        <div id="userForm">
            <h3>Add User</h3>
            <form id="addUserForm">
                <label for="name">Name:</label>
                <input type="text" id="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" required>

                <label for="mobile">Mobile Number:</label>
                <input type="number" id="mobile" required>

                <label>Gender:</label>
                <div class="radio-group">
                    <label><input type="radio" name="gender" value="Male"> Male</label>
                    <label><input type="radio" name="gender" value="Female"> Female</label>
                </div>

                <label>Hobbies:</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="hobbies[]" value="coding"> coding</label>
                    <label><input type="checkbox" name="hobbies[]" value="traveling"> traveling</label>
                    <label><input type="checkbox" name="hobbies[]" value="sports"> sports</label>
                    <label><input type="checkbox" name="hobbies[]" value="music"> music</label>
                </div>

                <div class="form-buttons">
                    <!-- <a href="#" style="text-decoration: none;" class="btn submit-btn">Submit</a> -->
                    <button type="button" class="btn submit-btn" id="save" >Submit</button>
                    <button type="button" class="btn close-btn" id="closeForm">Close</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // fetch all Data default show
            getdata();
            function getdata() {
                var allrecords = "action";
                var num = 0;
                $.ajax({
                    url: "action.php",
                    type: 'post',
                    data: {
                        "allrecords": allrecords
                    },
                    success : function(response){
                        $(".allDatable").html(response);
                    }
                });
            }

            // start Insert Data query and ajax request
            $('#openForm').click(function() {
                $('#userForm').fadeToggle();
            });

            $('#closeForm').click(function() {
                $('#userForm').fadeOut();
            });

            $('#save').click(function() {
                var name = $("#name").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var mobile = $("#mobile").val();
                var gender = $("input[name='gender']:checked").val();
                var hobbies = [];
                $(':checkbox:checked').each(function(i) {
                    hobbies[i] = $(this).val();
                });
                var insert = "action";

                $.ajax({
                    url: "action.php",
                    type: "post",
                    data: {
                        "name": name,
                        "email": email,
                        "password": password,
                        "mobile": mobile,
                        "gender": gender,
                        "hobbies": hobbies,
                        "insert": insert
                    },
                    success: function(insertreturn) {
                        getdata();
                    }
                });
                $('#userForm').fadeOut();
            });
            // End Insert Data query and ajax request

            //delete operation
            function rowdlt() {
                alert("yes");
            }

            //reset form after click add user button
            $("#openForm").click(function(){
                $("#addUserForm")[0].reset();
            });
        });
    </script>

</body>
</html>