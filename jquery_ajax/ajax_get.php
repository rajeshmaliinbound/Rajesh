<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


</head>
<body>
<form action="">
    <input type="text" id="name">
    <input type="email" id="email">
    
    <a href="#" id="submit">Submit</a>
</form>    
<div class="show">Hello</div>
<script>
    $(document).ready(function(){
        $("#submit").click(function(){
            var name = $("#name").val();
            var email = $("#email").val();
            console.log(name)
            console.log(email)
            $.ajax({
                url : "action.php",
                type : "post",
                data :{ "name" : name, "email"  : email },
                success : function(data){
                    $(".show").html(data);
                }
            });
        });
    });
</script>
</body>
</html>