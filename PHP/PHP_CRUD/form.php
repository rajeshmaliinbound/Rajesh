<?php
include 'header.php';
?>
    <div class="container">
        <h1>Registration Form</h1>
        <form action="insert.php" id="formData" method="post" enctype= "multipart/form-data">
            <label>Name:&nbsp;&nbsp;<span class="error" id="errorName"></label>
            <input type="text" id="Name" name="name" placeholder="Enter Name">

            <label>Email:&nbsp;&nbsp;<span class="error" id="errorEmail"></span></label>
            <span id="ValidEmail"></span>
            <input type="email" id="Email" name="email" placeholder="Enter Email">

            <label>Password:&nbsp;&nbsp;<span class="error" id="errorPassword"></span></label>
            <span id="ValidPassword"></span>
            <input type="password" id="Password" name="password" placeholder="Enter Password">

            <label>Mobile Number:&nbsp;&nbsp;<span class="error" id="errorNumber"></span><span class="sbmt"></span></label>
            <input type="tel" id="Number" name="mobile" placeholder="Enter Number">

            <label>Gender:&nbsp;&nbsp;<span class="error" id="errorGender"></span></label>
            <input type="radio" id="Male"   name="gender" value="Male"> Male &nbsp; &nbsp;
            <input type="radio" id="Female" name="gender" value="Female">Female

            <label>Date of Birth:&nbsp;&nbsp;<span class="error" id="errorDob"></span></label>
            <input type="date" id="Dob" name="dob">

            <label>Hobbies:&nbsp;&nbsp;<span class="error" id="HobbiesError"></span></label>
            <input type="checkbox" id="Coding" name="hobbies[]" value="Coding">Coding
            <input type="checkbox" id="Traveling" name="hobbies[]" value="traveling">Traveling
            <input type="checkbox" id="Sports"  name="hobbies[]" value="sports">Sports
            <input type="checkbox" id="Music" name="hobbies[]" value="music">Music
            <input type="checkbox" id="Art" name="hobbies[]" value="art">Art

            <label>Your Photo:&nbsp;&nbsp;<span class="error" id="errorFile"></span><br><span id="ValidFile"></span></label>
            <input type="file" id="File" name="image"><br><br>

            <div style="text-align: center;">
            <input type="submit" id="submit" value="Submit">
            </div>
        </form>
        <div class="login-link">
            <p>Already have an account?<a href="#">Login Now</a></p>
        </div>
    </div>
<?php include 'connection.php';?>
