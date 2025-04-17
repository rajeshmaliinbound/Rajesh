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
            $("#show-msg").html(response);
            getdata();
            setTimeout(function(){
                $(".deletemsg").fadeOut("slow");
            },1000);
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

// Update Edited Data using ajax request
function updateData(){
    var updateData = "action";
    var formedit = $('#editUserForm')[0];
    var editformData = new FormData(formedit);
    editformData.append('editupdate', 'updateData');
    $.ajax({
        url: "action.php",
        type: "POST",
        data: editformData,
        contentType: false,
        processData: false,
        success: function(response) {
            $("#show-msg").html(response);
            $('#usereditForm').fadeOut();
            getdata();
            setTimeout(function(){
                $(".edittmsg").fadeOut("slow");
            },1000);
        }
    });
}