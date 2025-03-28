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
   });
// <!----------------- jquery End ------------------->