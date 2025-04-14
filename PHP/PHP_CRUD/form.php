<?php
session_start();
include 'header.php';
if(isset($_GET["id"])){
    $id = $_GET["id"];
    include 'connection.php';
    $sql = "SELECT * FROM `registration` WHERE `id`=$id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $hobbies = explode(",", $row['hobbies']);
}

if(isset($_REQUEST['exitshobbies']))
{
    $hobbiData =  explode(",", $_REQUEST['exitshobbies']);
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
        
        <form action=" <?php if(isset($_GET["id"])){ echo "update.php"; }else{ echo "insert.php";} if(isset($_REQUEST['limit'])){ echo '?limit='.$_REQUEST['limit'];} if(isset($_REQUEST['fgender'])){ echo '&fgender='.$_REQUEST['fgender'];} if(isset($_REQUEST['fhobbies'])){ echo '&fhobbies='.$_REQUEST['fhobbies'];} if(isset($_REQUEST['page'])){ echo '&page='.$_REQUEST['page'];} if(isset($_REQUEST['search'])){ echo '&search='.$_REQUEST['search'];} if(isset($_REQUEST['field'])){ echo '&field='.$_REQUEST['field'];} if(isset($_REQUEST['sort'])){ echo '&sort='.$_REQUEST['sort'];}?>" id="formData" method="post" enctype= "multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <label>Name:&nbsp;&nbsp;<span class="error" id="errorName"></label>
            <span id="nameValid"></span>
            <input type="text" id="Name" name="name" value="<?php if(isset($_SESSION['email_exist_edit'])){ if(isset($_REQUEST['exitsname'])){ echo $_REQUEST['exitsname']; } }else{ if(isset($row['name'])){ echo $row['name'];} } ?>" placeholder="Enter Name">

            <label>Email:&nbsp;&nbsp;<span class="error" id="errorEmail"></span></label>
            <span id="ValidEmail" style="color:red;"><?php if(isset($_SESSION['email_exist_edit'])){ echo $_SESSION['email_exist_edit']; } ?></span>
            <input type="email" id="Email" name="email" value="<?php if(isset($_SESSION['email_exist_edit'])){ if(isset($_REQUEST['exitsemail'])){ echo $_REQUEST['exitsemail']; } }else{ if(isset($row['email'])){ echo $row['email'];} } ?>" placeholder="Enter Email">

            <label>Password:&nbsp;&nbsp;<span class="error" id="errorPassword"></span></label>
            <span id="ValidPassword"></span>
            <input type="password" value="<?php if(isset($_SESSION['email_exist_edit'])){ if(isset($_REQUEST['exitspassword'])){ echo $_REQUEST['exitspassword']; } }else{ if(isset($row['password'])){ echo $row['password'];} } ?>" id="Password" name="password" placeholder="Enter Password">

            <span style="color: red; font-size: 14px;" class="passmetch"></span>

            <label>Confirm Password:&nbsp;&nbsp;<span class="error" id="errorConfirm-Password"></span></label>
            <span id="ValidConfirm-Password"></span>
            <input type="password" value="<?php if(isset($_SESSION['email_exist_edit'])){ if(isset($_REQUEST['exitspassword'])){ echo $_REQUEST['exitspassword']; } }else{ if(isset($row['password'])){ echo $row['password'];} } ?>" id="Confirm-Password" name="confirmpass" placeholder="Confirm Password">
            <span style="color: red; font-size: 14px;" class="passmetch"></span>

            <label>Mobile Number:&nbsp;&nbsp;<span class="error" id="errorNumber"></span><span class="sbmt"></span></label>
            <span id="ValidNumber"></span>
            <input type="tel" id="Number" value="<?php if(isset($_SESSION['email_exist_edit'])){ if(isset($_REQUEST['exitsphone'])){ echo $_REQUEST['exitsphone']; } }else{ if(isset($row['phone'])){ echo $row['phone'];} } ?>" name="mobile" placeholder="Enter Number">

            <label>Gender:&nbsp;&nbsp;<span class="error" id="errorGender"></span></label>
            <input type="radio" id="Male"  name="gender" value="Male"
            <?php if(isset($_SESSION['email_exist_edit'])){ if(isset($_REQUEST['exitsgender'])) { if($_REQUEST['exitsgender']=='Male'){ echo "checked";}}  }else{ if(isset($row['gender'])){ if($row['gender']=='Male'){ echo "checked";}}  } 

            ?>> <label for="Male" style="display: inline;">Male</label> &nbsp; &nbsp;
            <input type="radio" id="Female" name="gender" value="Female"
            <?php
            if(isset($_SESSION['email_exist_edit'])){ if(isset($_REQUEST['exitsgender'])){ if($_REQUEST['exitsgender']=='Female'){ echo "checked";}}  }else{ if(isset($row['gender'])) { if($row['gender']=='Female'){ echo "checked";}} }           
            ?>><label for="Female" style="display: inline;">Female</label>

            <label>Date of Birth:&nbsp;&nbsp;<span class="error" id="errorDob"></span></label>
            <input type="date" id="Dob" value="<?php if(isset($_SESSION['email_exist_edit'])){ if(isset($_REQUEST['exitsdob'])){ echo $_REQUEST['exitsdob']; } } else{ if(isset($row['dob'])){ echo $row['dob'];} } ?>" name="dob">
            <div id="dobValid"><span style="color: red; font-size: 12px;">invalid user (you are not 18+)</span></div>

            <label>Hobbies:&nbsp;&nbsp;<span class="error" id="HobbiesError" class="hbinput"></span></label>
            <input type="checkbox" id="Coding" name="hobbies[]" value="Coding"
            <?php
            if(isset($_SESSION['email_exist_edit'])){ if(isset($hobbiData)) { if(in_array("Coding", $hobbiData)){ echo "checked"; }} }else{ if(isset($row['hobbies'])){ if(in_array("Coding", $hobbies)){ echo "checked"; } } }            
            ?>><label for="Coding" style="display: inline;">Coding</label>

            <input type="checkbox" id="Traveling" name="hobbies[]" value="traveling"
            <?php
            if(isset($_SESSION['email_exist_edit'])){ if(isset($hobbiData)) { if(in_array("traveling", $hobbiData)){ echo "checked"; }} }else{ if(isset($row['hobbies'])){ if(in_array("traveling", $hobbies)){ echo "checked"; } } }    
            ?>><label for="Traveling" style="display: inline;">traveling</label>

            <input type="checkbox" id="sports"  name="hobbies[]" value="sports"
            <?php
            if(isset($_SESSION['email_exist_edit'])){ if(isset($hobbiData)) { if(in_array("sports", $hobbiData)){ echo "checked"; }} }else{ if(isset($row['hobbies'])){ if(in_array("sports", $hobbies)){ echo "checked"; } } }    
            ?>><label for="sports" style="display: inline;">sports</label>

            <input type="checkbox" id="Music" name="hobbies[]" value="music"
            <?php
            if(isset($_SESSION['email_exist_edit'])){ if(isset($hobbiData)) { if(in_array("music", $hobbiData)){ echo "checked"; }} }else{ if(isset($row['hobbies'])){ if(in_array("music", $hobbies)){ echo "checked"; } } }    
            ?>><label for="Music" style="display: inline;">music</label>

            <input type="checkbox" id="Art" name="hobbies[]" value="art"
            <?php
            if(isset($_SESSION['email_exist_edit'])){ if(isset($hobbiData)) { if(in_array("art", $hobbiData)){ echo "checked"; }} unset($_SESSION['email_exist_edit']); }else{ if(isset($row['hobbies'])){ if(in_array("art", $hobbies)){ echo "checked"; } } }                
            ?>><label for="Art" style="display: inline;">art</label>

            <label>Your Photo:&nbsp;&nbsp;<span id="errorFile"></span><br><span id="ValidFile"></span></label>
            <input style="color: black;" type="file" value="" id="File" name="image"><br><br>
           
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
        <!-- <div class="login-link">
            <p style="color: black;">Already have an account?<a href="#">Login Now</a></p>
        </div> -->
    </div>

    <script>
        // confirm Password Valiadtion on blur
        $("input[type='password']").blur(function(){
            var confirmpasVal = $("input[name='confirmpass']").val();
            var passwordVal = $("input[name='password']").val();
            if($("input[name='password']").val()== '' || $("input[name='confirmpass']").val()== '' ){                
            }else{
                if(confirmpasVal == passwordVal){
                    $(".passmetch").text("");
                }else{
                    $(".passmetch").text("Password Does not metch...!");
                }
            }
        });

        //confirm password Valiadtion focus
        $("input[type='password']").focus(function(){
            $(".passmetch").text("");
        });

        $("#Email").focus(function(){
            $("#ValidEmail").text("");
        })


        $('#dobValid').hide();
        $(document).ready(function(){
            // Blur on inputs
            $("input").blur(function(){
                let blurID = $(this).attr("id");
                var valid = true;

                if($(this).val()=== ''){
                    valid = false;
                }
                
                if(!valid){
                    $("#error" +blurID).text(blurID +" field is require");
                    $("#error" +blurID).css({"color":"red"});
                    
                    <?php if(isset($row['id'])){ ?> $("#errorFile").text(""); <?php } ?>
                }

                //date of Birth Valid on input
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
            });

            $("#File").change(function(){
                <?php if(isset($row['id'])){ ?> $("#errorFile").text(""); <?php } ?>
            });


            //--------Start Regular Expresion for Email,password,File, Moibile Number , Name--------
            $("input[name='name']").blur(function(){
                var namepattern = /^[A-Za-z ]{2,20}$/;
                NNameValue = $(this).val();
                if(NNameValue === ''){
                    $("#nameValid").text("");
                }else{
                    if(!namepattern.test(NNameValue)){
                        $("#nameValid").text("Invalid Name...!");
                        $("#nameValid").css({"fontSize":"12px","color":"red"});
                    }else{
                        $("#nameValid").text("");
                    }
                }                
            })

            $("input[name='name']").blur(function(){
                var namepattern = /^[A-Za-z ]{2,20}$/;
                NNameValue = $(this).val();
                if(NNameValue === ''){
                    $("#nameValid").text("");
                }else{
                    if(!namepattern.test(NNameValue)){
                        $("#nameValid").text("Invalid Name...!");
                        $("#nameValid").css({"fontSize":"12px","color":"red"});
                    }else{
                        $("#nameValid").text("");
                    }
                }                
            });

            $("input").focus(function(){                    
                if($(this).attr("type") === $("input[name='email']").attr("type") || 
                    $(this).attr("type") === $("input[type='password']").attr("type") || 
                    $(this).attr("type") === $("input[name='image']").attr("type") ||
                    $(this).attr("type") === $("input[name='mobile']").attr("type"))
                    {
                        var emailPattern = /^[a-z0-9.]+@[a-z]+\.[a-z]{2,6}$/;
                        var passwordpattern = /^[a-zA-Z0-9!@#$%^&*()_+-=]{8,15}$/;
                        var filePattern = /\.(jpg|jpeg|png|jfif)$/i;
                        var numberPattern = /^([0-9]{10,11})$/;

                        $(this).change(function(){
                            let validData = $(this).attr("id");
                            let value = $(this).val();
                            if($(this).val() === ''){
                                if($(this).attr("type") === $("input[name='image']").attr("type")){
                                   <?php
                                    if(!isset($row['id'])){
                                        ?>
                                         $("#errorFile").text("Please Select an Image");
                                         <?php
                                    }
                                    ?>
                                }
                                $("#Valid" +validData).text("");
                                valid = false;
                            }else{                                
                                if (emailPattern.test(value) || passwordpattern.test(value) || filePattern.test(value) || numberPattern.test(value)){
                                    $("#Valid" +validData).text("");
                                }else{
                                    if($(this).attr("type") === $("input[name='image']").attr("type")){
                                        $("#Valid" +validData).text("please choose a valid File like: .jpg | .jpeg | .png | .jfif");
                                        $("#Valid" +validData).css({"fontSize":"12px","color":"red"});
                                    }else{
                                        $("#Valid" +validData).text("Invalid "+validData +"!");
                                        $("#Valid" +validData).css({"fontSize":"12px","color":"red"});
                                    }
                                }
                            }
                        });
                    }
                });
            //--------End Regular Expresion for Email,password,File--------
            
            //Error on submit 
            $("#formData").submit(function(e){
                var isValid = true;
                let CpasswordValcheck = $("#Confirm-Password").val();
                let passValcheck = $("#Password").val();
                var namespace = $('#Name').val().trim();
                
                //confirm password check
                if(CpasswordValcheck == passValcheck){
                    $(".passmetch").text("");
                }else{
                    isValid = false;
                    $(".passmetch").text("Password Does not metch...!");
                }

                if(namespace === ''){
                    $("#errorName").text("Name field is require");
                    isValid = false;
                }else{
                    var Npattern = /^[A-Za-z ]{2,20}$/;
                    if(!Npattern.test(namespace)){
                        $("#nameValid").text("Invalid Name...!");
                        $("#nameValid").css({"fontSize":"12px","color":"red"});
                        isValid = false;
                    }else{
                        $("#nameValid").text("");
                    }
                }

                if($("#Email").val()=== ''){
                    $("#errorEmail").text("Email field is require");
                    isValid = false;
                }else{
                    let mailPattern = /^[a-z0-9.]+@[a-z]+\.[a-z]{2,6}$/;
                    Valemail = $("#Email").val();
                    if(!mailPattern.test(Valemail)){
                        isValid = false;
                    }
                }

                if($("#Password").val()=== ''){
                    $("#errorPassword").text("Password field is require");
                    isValid = false;
                }else{
                    let passPattern = /^[a-zA-Z0-9!@#$%^&*()_+-=]{8,15}$/;
                    pVal = $("#Password").val();
                    if(!passPattern.test(pVal)){
                        isValid = false;
                    }
                }

                if($("#Confirm-Password").val()=== ''){
                    $("#errorConfirm-Password").text("Confirm-Password field is require");
                    isValid = false;
                }else{
                    let passPattern = /^[a-zA-Z0-9!@#$%^&*()_+-=]{8,15}$/;
                    Valepass = $("#Confirm-Password").val();
                    if(!passPattern.test(Valepass)){
                        isValid = false;
                    }
                }

                if($("#Number").val()=== ''){
                    $("#errorNumber").text("Number field is require");
                    isValid = false;
                }else{
                    let numPattern = /^([0-9]{10,11})$/;
                    Valuenum = $("#Number").val();
                    if(!numPattern.test(Valuenum)){
                        $("#ValidNumber").text("Invalid Number");
                        $("#ValidNumber").css({"fontSize":"12px","color":"red"});
                        isValid = false;
                    }
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
                    }else{
                        var imgPattern = /\.(jpg|jpeg|png|jfif)$/i;
                        Valueimg = $("#File").val();
                        if(!imgPattern.test(Valueimg)){
                            isValid = false;
                        }
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
<?php
 include 'connection.php';?>
