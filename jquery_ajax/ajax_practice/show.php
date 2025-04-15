<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            getdata();
            function getdata()
            {
                var show = "display";
                $.ajax({
                    type: 'post',
                    url: "action.php",
                    data : {"action" : show},
                    success : function(response){
                        // console.log(response);
                        $.each(response, function (key, value) { 
                            // console.log(value['name']);
                            $('.tabledata').append('<tr>'+
                                '<td>'+value['id']+'</td>\
                                <td>'+value['name']+'</td>\
                                <td>'+value['email']+'</td>\
                                <td>\
                                    <a href="#">EDIT</a>\
                                    <a href="#" style="color:red;">DELETE</a>\
                                </td>\
                            </tr>');
                        });
                    }
                });
            }

            $("#submit").click(function(){
                var name = $("#name").val();
                var email = $("#email").val();
                $.ajax({
                    url : "action.php",
                    type : "post",
                    data :{ "name" : name, "email"  : email },
                    success : function(data){
                        $(".showinsert").html(data);
                    }
                });
            });
        });
    </script>
   
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>    
   <!-- table part  -->
    <div>
        <h3>Show All Data</h3>
    </div>
    <div class="table-Data">
        <table class="tabledata">
            <tr>
                <!-- All table Colums -->
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th colspan ="2">ACTIONS</th>
            </tr>
            
        </table>
    </div>    

    <div class="showinsert"></div>
    
    <div class="formshow">
        <form action="" class="Addform">
            <h4>Add New</h4>
            Name: <input type="text" id="name" placeholder="Enter Name"> <br><br>
            Email: <input type="email" id="email" placeholder="Enter Email"><br><br>
            <a href="#" id="submit" >Submit</a>
        </form>        
    </div>

    <div id="arrayData"></div>
</body>
</html>