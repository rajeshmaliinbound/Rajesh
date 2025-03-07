<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>

<h4>Demonstrate fadeToggle() with same Parameter</h4>
<button>fadeToggle</button><br><br>

<div id="box1"></div><br>
<div id="box2"></div><br>
<div id="box3"></div>

<script>
    $(document).ready(function(){
        $("#box1").css({"width":"100px", "height":"100px", "background-color":"red"});
        $("#box2").css({"width":"100px", "height":"100px", "background-color":"yellow"});
        $("#box3").css({"height":"100px", "width":"100px", "background-color":"green"});

        $("button").click(function(){
            $("#box1").fadeToggle(2000);
            $("#box2").fadeToggle(1200);
            $("#box3").fadeToggle(1000);
        });
    });
</script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>