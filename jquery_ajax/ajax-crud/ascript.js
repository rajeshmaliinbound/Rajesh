// fetch all Data default show
getdata();

// function of fetch all Data
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

// start Insert Data using ajax request
function insertData(){
    var name = $("#iname").val();
    var email = $("#iemail").val();
    var password = $("#ipassword").val();
    var mobile = $("#imobile").val();
    var file = $("#iFile").val();
    var gender = $("input[class='igender']:checked").val();
    var hobbies = [];
    $('.ihobbie:checked').each(function(i) {
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
            "image": file,
            "insert": insert
        },
        success: function(insertreturn) {
            $('#userForm').fadeOut();
            getdata();
        }
    });
}
// End Insert Data using ajax request

// delete operation
function deletedata(id) {
    var conf = confirm("Are You Sure?");
    var deleterecord = "action";
    if(conf==true){
    $.ajax({
        url: "action.php",
        type: 'post',
        data: {
            "id": id,
            "deleterow": deleterecord
        },
        success : function(response){
            $(".show-delete-msg").html(response);
            getdata();
            $(".show-delete-msg").fadeOut(3000);
        }
    });
    }
}

// Edit operation
function editdata(id) {
    $('#userForm').fadeOut();
    $("#usereditForm").fadeIn();
    var editrow = "action";
    $.ajax({
        url: "action.php",
        type: 'post',
        data: {
            "id": id,
            "editrow": editrow
        },
        success : function(response){
            $("#usereditForm").html(response);
        }
    });
}

function closeeditform(){
    $("#usereditForm").fadeOut();
}

// start Update Edit Data using ajax request
function updateData(){
    var updateid = $("#idinput").val()
    var name = $("#uname").val();
    var email = $("#uemail").val();
    var password = $("#upassword").val();
    var mobile = $("#umobile").val();
    var gender = $("input[class='ugender']:checked").val();
    var hobbies = [];
    $('.uhobbie:checked').each(function(i) {
        hobbies[i] = $(this).val();
    });
    var updateData = "action";

    $.ajax({
        url: "action.php",
        type: "post",
        data: {
            "id": updateid,
            "name": name,
            "email": email,
            "password": password,
            "mobile": mobile,
            "gender": gender,
            "hobbies": hobbies,
            "updateData": updateData
        },
        success: function(response) {
            $('#usereditForm').fadeOut();
            getdata();
        }
    });
}
// End Update Edit Data using ajax request