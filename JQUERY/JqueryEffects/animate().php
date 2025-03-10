<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>

<h2>use of animate() Method...</h2>
<h3>Perform Animate click on this button</h3>
<button id="btn1">Start</button>
<button id="btn2">End</button><br><br>
<div id="box1"><p>I'M RAJESH</p></div>

<script>
    $(document).ready(function(){
        $("#box1").css({"height":"100px", "width":"100px", "background-color": "green",
                        "position":"absolute", "cursor":"pointer", "text-align":"center"});

        $("#btn1").click(function(){
            $("#box1").animate({
                left: '250px',
                opacity: '0.5',
                height: '400px',
                width: '200px',
                color: 'red'
            });
        });

        $("#btn2").click(function(){
            $("#box1").animate({
                left: '0px',
                opacity: '0.9',
                height: '100px',
                width: '100px',
            });
        });
    });
</script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>