<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>

<h4>Demonstrate fadeOut() with different parameters...</h4>
<button>Click to fade out Boxes</button><br><br>

<div id="box1"></div><br>
<div id="box2"></div><br>
<div id="box3"></div><br>

<script>
    $(document).ready(function(){
        $("#box1").css({"height":"100px", "width":"100px", "background-color": "red"});
        $("#box2").css({"height":"100px", "width":"100px", "background-color": "yellow"});
        $("#box3").css({"height":"100px", "width":"100px", "background-color": "green"});

        $("button").click(function(){
            $("#box1").fadeOut();
            $("#box2").fadeOut("slow");
            $("#box3").fadeOut(1000);
        });
    });
</script>

<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>