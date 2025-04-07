<?php
include 'header.php';
if(isset($_GET["id"])){
    $id = $_GET["id"];
    include 'connection.php';
    $sql = "SELECT * FROM `registration` WHERE `id`=$id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $hobbies = explode(",", $row['hobbies']);
}
?>
    <div class="container">
        <h1>
        <?php
        if(isset($row["id"])){
            echo "&nbsp&nbsp&nbsp&nbsp&nbspEdit Form";
        }else{
            echo "Registration Form";
        }?>
        </h1>
        
        <form action=" <?php if(isset($_GET["id"])){ echo "update.php"; }else{ echo "insert.php"; }?><?php if(isset($_REQUEST['limit'])){ echo '?limit='.$_REQUEST['limit'];} if(isset($_REQUEST['fgender'])){ echo '&fgender='.$_REQUEST['fgender'];} if(isset($_REQUEST['fhobbies'])){ echo '&fhobbies='.$_REQUEST['fhobbies'];} if(isset($_REQUEST['page'])){ echo '&page='.$_REQUEST['page'];} if(isset($_REQUEST['search'])){ echo '&search='.$_REQUEST['search'];} if(isset($_REQUEST['field'])){ echo '&field='.$_REQUEST['field'];} if(isset($_REQUEST['sort'])){ echo '&sort='.$_REQUEST['sort'];}?>" id="formData" method="post" enctype= "multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <label>Name:&nbsp;&nbsp;<span class="error" id="errorName"></label>
            <input type="text" id="Name" name="name" value="<?php
             if(isset($row['name']))
             {
                echo $row['name'];
             }
             ?>" placeholder="Enter Name">

            <label>Email:&nbsp;&nbsp;<span class="error" id="errorEmail"></span></label>
            <span id="ValidEmail"></span>
            <input type="email" id="Email" name="email" value="<?php if(isset($row['email'])){ echo $row['email'];} ?>" placeholder="Enter Email">

            <label>Password:&nbsp;&nbsp;<span class="error" id="errorPassword"></span></label>
            <span id="ValidPassword"></span>
            <input type="password" value="<?php if(isset($row['password'])){ echo $row['password'];} ?>" id="Password" name="password" v placeholder="Enter Password">

            <label>Mobile Number:&nbsp;&nbsp;<span class="error" id="errorNumber"></span><span class="sbmt"></span></label>
            <input type="tel" id="Number" value="<?php if(isset($row['phone'])){ echo $row['phone'];} ?>" name="mobile" placeholder="Enter Number">

            <label>Gender:&nbsp;&nbsp;<span class="error" id="errorGender"></span></label>
            <input type="radio" id="Male"  name="gender" value="Male"
            <?php
            if(isset($row['gender']))
            {
                if($row['gender']=='Male'){
                    echo "checked";
                }
            }
            ?>> <label for="Male" style="display: inline;">Male</label> &nbsp; &nbsp;
            <input type="radio" id="Female" name="gender" value="Female"
            <?php
            if(isset($row['gender']))
            {
                if($row['gender']=='Female'){
                    echo "checked";
                }
            }
            ?>><label for="Female" style="display: inline;">Female</label>

            <label>Date of Birth:&nbsp;&nbsp;<span class="error" id="errorDob"></span></label>
            <input type="date" id="Dob" value="<?php if(isset($row['dob'])){ echo $row['dob'];} ?>" name="dob">
            <div id="dobValid"><span style="color: red; font-size: 12px;">invalid user (you are not 18+)</span></div>

            <label>Hobbies:&nbsp;&nbsp;<span class="error" id="HobbiesError"></span></label>
            <input type="checkbox" id="Coding" name="hobbies[]" value="Coding"
            <?php
            if(isset($row['hobbies']))
            {
                if(in_array("Coding", $hobbies))
                {
                    echo "checked";
                }
            }
            ?>><label for="Coding" style="display: inline;">Coding</label>

            <input type="checkbox" id="Traveling" name="hobbies[]" value="traveling"
            <?php
            if(isset($row['hobbies']))
            {
                if(in_array("traveling", $hobbies)){
                    echo "checked";
                }
            }
            ?>><label for="Traveling" style="display: inline;">traveling</label>

            <input type="checkbox" id="sports"  name="hobbies[]" value="sports"
            <?php
            if(isset($row['hobbies']))
            {
                if(in_array("sports", $hobbies)){
                    echo "checked";
                }
            }
            ?>><label for="sports" style="display: inline;">sports</label>

            <input type="checkbox" id="Music" name="hobbies[]" value="music"
            <?php
            if(isset($row['hobbies']))
            {
                if(in_array("music", $hobbies)){
                    echo "checked";
                }
            }
            ?>><label for="Music" style="display: inline;">music</label>

            <input type="checkbox" id="Art" name="hobbies[]" value="art"
            <?php
            if(isset($row['hobbies']))
            {
                if(in_array("art", $hobbies)){
                    echo "checked";
                }
            }
            ?>><label for="Art" style="display: inline;">art</label>

            <label>Your Photo:&nbsp;&nbsp;<span id="errorFile"></span><br><span id="ValidFile"></span></label>
            <input type="file" value="" id="File" name="image"><br><br>
           
            <input type="hidden" value="<?php if(isset($row['image'])){ echo $row['image'];} ?>" id="HiddenFile" name="oldfile">
            <?php
              if(isset($row['image'])){
                ?>
                <img width="100" src="upload/<?php echo $row["image"] ?>" alt="Empty">
                <?php
              }
            ?>

            <div style="text-align: center;">
            <input type="submit" id="submit" value="Submit">
            </div>
        </form>
         <?php
         if(isset($_REQUEST['page'])){?>
            <span id="back"><a href="display.php<?php if(isset($_REQUEST['sort'])){?>?sort=<?php echo $_REQUEST['sort'];}?><?php if(isset($_REQUEST['field'])){?>&field=<?php echo $_REQUEST['field'];}?><?php if(isset($_REQUEST['search'])){?>&search=<?php echo $_REQUEST['search'];} if(isset($_REQUEST['limit'])){ ?>&limit=<?php echo $_REQUEST['limit'];} if(isset($_REQUEST['fgender'])){ ?>&fgender=<?php echo $_REQUEST['fgender'];} if(isset($_REQUEST['fhobbies'])){ ?>&fhobbies=<?php echo $_REQUEST['fhobbies'];} if(isset($_REQUEST['page'])){ ?>&page=<?php echo $_REQUEST['page'];}?>">Back</a></span>
         <?php }
          ?>
        <div class="login-link">
            <p>Already have an account?<a href="#">Login Now</a></p>
        </div>
    </div>

    <script>
        $('#dobValid').hide();
        $(document).ready(function(){
            // Blur on inputs
            $("input").blur(function(){
                let blurID = $(this).attr("id");
                var valid = true;

                if($(this).val()=== ''){
                    valid = false;
                }

                $(this).mousedown(function(){
                    <?php
                     if(isset($row['id'])){
                         
                     }else{
                        ?>$("#error" +inputID).text("");<?php
                     }
                    ?>
                });

                //date of Birth Valid on input Blue
                if($(this).attr("type") === $("input[type='date']").attr("type")){
                    if($("#Dob").val()=== ''){
                         $('#dobValid').hide();
                    }else{
                        var dob = $('#Dob').val();
                        if (dob) {
                            var dobDate = new Date(dob);
                            var currentDate = new Date(); 
                            var age = currentDate.getFullYear() - dobDate.getFullYear();
                            var month = currentDate.getMonth() - dobDate.getMonth();
                            
                            if(month < 0 || (month === 0 && currentDate.getDate() < dobDate.getDate())) {
                                age--;
                            }

                            if(age >= 18){
                                $('#dobValid').hide();
                            } else {                            
                                $('#dobValid').show();
                                isValid = false;
                            }
                        }
                    }
                }
                //complate

                //--------Start Regular Expresion for Email,password,File--------
                if($(this).attr("type") === $("input[name='email']").attr("type") || 
                $(this).attr("type") === $("input[type='password']").attr("type") || 
                $(this).attr("type") === $("input[name='image']").attr("type"))
                {
                    let value = $(this).val();
                    var emailPattern = /^[a-z0-9.]+@[a-z]+\.[a-z]{2,6}$/;
                    var passwordpattern = /^[a-zA-Z0-9!@#$%^&*()_+-=]{8,15}$/;
                    var filePattern = /\.(jpg|jpeg|png|jfif)$/;
                    if($(this).val() === ''){
                        valid = false;
                    }else{
                        if (emailPattern.test(value) || passwordpattern.test(value) || filePattern.test(value)){
                            $("#Valid" +blurID).text("");
                        }else{
                            if($(this).attr("type") === $("input[name='image']").attr("type")){
                                $("#Valid" +blurID).text("please choose a valid File like:- .jpg | .jpeg | .png | .jfif");
                                $("#Valid" +blurID).css({"fontSize":"12px","color":"red"});
                            }else{
                                $("#Valid" +blurID).text("please enter a valid "+blurID);
                                $("#Valid" +blurID).css({"fontSize":"12px","color":"red"});
                            }   
                        }
                    }
                }

                //--------End Regular Expresion for Email,password,File--------
                if(!valid){
                    <?php
                     if(isset($row['id'])){
                        ?> $("#error" +blurID).text(""); <?php
                     }else{ ?>
                        $("#error" +blurID).text(blurID +" field is require");
                        $("#error" +blurID).css({"color":"red"}); <?php
                     }
                    ?>
                }else{
                $("#error" +blurID).text("");
                }
            });
            
            //Error on submit 
            $("#formData").submit(function(e){
                var isValid = true;

                if($("#Name").val()=== ''){
                    $("#errorName").text("Name field is require");
                    isValid = false;
                }

                if($("#Email").val()=== ''){
                    $("#errorEmail").text("Email field is require");
                    isValid = false;
                }

                if($("#Password").val()=== ''){
                    $("#errorPassword").text("Password field is require");
                    isValid = false;
                }

                if($("#Number").val()=== ''){
                    $("#errorNumber").text("Number field is require");
                    isValid = false;
                }

                if(!$("input[name='gender']:checked").val()){
                    $("#errorGender").text("Gender field is require");
                    isValid = false;
                }

                // Date of birth Validation 
                if($("#Dob").val()=== ''){
                    $("#errorDob").text("DOB field is require");
                    isValid = false;
                }else{
                    var dob = $('#Dob').val();
                    if (dob) {
                        var dobDate = new Date(dob);
                        var currentDate = new Date(); 
                        var age = currentDate.getFullYear() - dobDate.getFullYear();
                        var month = currentDate.getMonth() - dobDate.getMonth();
                        
                        if(month < 0 || (month === 0 && currentDate.getDate() < dobDate.getDate())) {
                            age--;
                        }

                        if(age >= 18){
                            $('#dobValid').hide();
                        } else {                            
                            $('#dobValid').show();
                            isValid = false;
                        }
                    }

                }

                    
                if(!$("input[name='hobbies[]']:checked").val()){
                    $("#HobbiesError").text("Hobbies field is require");
                    isValid = false;
                }

                <?php
                if(isset($row["id"])){
                    ?>
                    if($("#HiddenFile").val()=== ''){
                        if($("#File").val()=== ''){
                            $("#errorFile").text("File field is Require");
                        }else{
                            $("#errorFile").text("");
                        }
                    }else{
                        $("#ValidFile").text("");
                        $("#errorFile").text("");
                    }
                    <?php
                }else{
                    ?>
                    if($("#File").val()=== ''){
                        $("#errorFile").text("File field is Require");
                        isValid = false;
                    }
                    <?php
                }
                ?>
                if(!isValid){
                    e.preventDefault();
                }
            });

        })
    </script>
<?php include 'connection.php';?>
