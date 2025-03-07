<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>

<div style="text-align: center;">
    <h2>Use a jQuery method to slideDown()...</h2>
    <div id="box1"><p> on this for SlideDown panel</p></div>
    <div id="box2"><p> slideDown Successfull</p></div><br>
</div>

<script>
    $(document).ready(function(){
        $("#box1").css({"height":"40px", "width":"100vh","background-color":"yellowgreen", "text-align":"center",
                        "border":"2px solid Black", "margin-left":"340px", "cursor":"pointer"});
        $("#box2").css({"height":"150px", "width":"100vh","background-color":"greenyellow", "text-align":"center",
                        "border":"2px solid Black", "margin-left":"340px", "display":"none"});

        
        $("#box1").click(function(){
            $("#box2").slideDown("slow");
        });
    });


</script>

<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>