<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>
<p>Demonstrate fadeIn() with different parameters.</p>
<button>Click to fade in boxes</button><br><br>
<div id="box1" style="width: 100px; height: 100px; background-color: red; display: none;"></div><br>
<div id="box2" style="width: 100px; height: 100px; background-color: yellow; display: none;"></div><br>
<div id="box3" style="width: 100px; height: 100px; background-color: green; display: none"></div>

<script>
    $(document).ready(function(){
        $("button").click(function(){
            $("#box1").fadeIn(1000);
            $("#box2").fadeIn("slow");
            $("#box3").fadeIn(3000);
        });
    });
</script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>