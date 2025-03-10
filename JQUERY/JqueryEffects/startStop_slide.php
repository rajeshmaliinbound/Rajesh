<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>

<div style="text-align: center;">
    <h2>Use a jQuery method to slideToggle()...</h2>
    <button id="btn1">Start</button>
    <button id="btn2">Stop</button><br><br>
    <div id="box1"><p>Click on this for slideToggle panel</p></div>
    <div id="box2"><p> I'm Rajesh </p></div><br>
</div>

<script>
    $(document).ready(function(){
        $("#box1").css({"height":"40px", "width":"100vh","background-color":"yellowgreen", "text-align":"center",
                        "border":"2px solid Black", "margin-left":"340px", "cursor":"pointer"});
        $("#box2").css({"height":"150px", "width":"100vh","background-color":"greenyellow", "text-align":"center",
                        "border":"2px solid Black", "margin-left":"340px"});

        $("#box1").click(function(){
            $("#box2").slideToggle(2000);
        });

        $("#btn1").click(function(){
            $("#box2").slideToggle(2000);
        });

        $("#btn2").click(function(){
            $("#box2").stop();
        });
    });


</script>

<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>