<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>

<h4>Use a jQuery method to fadeTo()...</h4>
<button>fadeTo</button><br><br>

<div id="box1"></div><br>
<div id="box2"></div><br>
<div id="box3"></div><br>

<script>
    $(document).ready(function(){
        $("#box1").css({"height":"100px", "width":"100px","background-color":"red"});
        $("#box2").css({"height":"100px", "width":"100px","background-color":"yellow"});
        $("#box3").css({"height":"100px", "width":"100px","background-color":"green"});

        $("button").click(function(){
            $("#box1").fadeTo("slow", 0.20);
            $("#box2").fadeTo("slow", 0.10);
            $("#box3").fadeTo("slow", 0.25);
        });
    });


</script>

<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>