// <!-----------------Form Validation jquery Start ------------------->
    $(document).ready(function(){

        // focus on inputs
        $("input").focus(function(){
            let inputID = $(this).attr("id");
            var valid = true;

            $(this).keypress(function(){
                $("#error" +inputID).text("");
            });

            $(this).change(function(){
                $("#error" +inputID).text("");
            });

            if($(this).val()=== ''){
                valid = false;
            }

            $(this).keyup(function(){
                    if($(this).val()=== ''){
                            $("#error" +inputID).text("please enter " +inputID);
                    }
                    if($(this).attr("type")=== "file")
                    {
                        $("#error" +inputID).text("please select " +inputID);
                    }
                });
                

            if(!valid){
                if($(this).attr("type")=== "file")
                {
                    $("#error" +inputID).text("please select " +inputID);
                }else{
                    $("#error" +inputID).text("please enter " +inputID);
                    $("#error" +inputID).css({"color":" rgb(214, 57, 57)"});
                }
            }else{
                $("#error" +inputID).text("");
            }
        });
        

        // Blur on inputs
        $("input").blur(function(){
            let blurID = $(this).attr("id");
            var valid = true;

            if($(this).val()=== ''){
                valid = false;
            }

            $(this).mousedown(function(){
                $("#error" +inputID).text("");
            });

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
                $("#error" +blurID).text(blurID +" field is require");
                $("#error" +blurID).css({"color":"red"});
            }else{
            $("#error" +blurID).text("");
            }
        });
//------------for redio type input Validation Start-------------------
        // focus on Gender
        $("input[name='gender']").focus(function() {
            let GENDER = $(this).attr("type");
            let GenderID = $(this).attr("id");
            if (GENDER === "radio") {
                $("#errorGender").text("please select your Gender");
                $("#errorGender").css({"color":" rgb(214, 57, 57)"});
            }

            $(this).change(function() {
            $('#errorGender').text('');
            });
            
            if($(this).attr("id")===""+GenderID){
                $("#errorGender").text("Selecting " +GenderID);
            }
        });

        //blur on Gender
        $("input[name='gender']").blur(function() {
            if(!$("input[name='gender']:checked").val()){
                $("#errorGender").text("Gender field is require");
                $("#errorGender").css({"color":"red"});
            }else{
                $('#errorGender').text('');
            }
        });

//------------for checkbox type input Validation Start---------------
        $("input[name='hobbies[]']").focus(function() {
            let hobbies = $(this).attr("type");
            let HID = $(this).attr("id");
            if (hobbies === "checkbox") {
                $("#HobbiesError").text("Please Select Hobbies");
                $("#HobbiesError").css({"color":" rgb(214, 57, 57)"});
            }

            $(this).change(function(){
            $('#HobbiesError').text('');
            });
            
            if($(this).attr("id")===""+HID){
                $("#HobbiesError").text("" +HID);
            }
        });

        $("input[name='hobbies[]']").blur(function(){
            if(!$("input[name='hobbies[]']:checked").val()){
                $("#HobbiesError").text("Hobbies field is require");
                $("#HobbiesError").css({"color":"red"});
            }else{
                $('#HobbiesError').text('');
            }
        });
//------------for checkbox type input Validation End---------------        

//------------submit Validation Start---------------
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

            if($("#Dob").val()=== ''){
                $("#errorDob").text("DOB field is require");
                isValid = false;
            }

            if(!$("input[name='hobbies[]']:checked").val()){
                $("#HobbiesError").text("Hobbies field is require");
                isValid = false;
            }

            if($("#File").val()=== ''){
                $("#errorFile").text("File field is Require");
                isValid = false;
            }

            if(!isValid){
                e.preventDefault();
            }
});
//------------submit Validation End---------------
});
// <!----------------- jquery End ------------------->