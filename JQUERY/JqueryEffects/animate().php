<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>

<h3>use of animate() Method...</h3>
<div id="box1"><p>I'M RAJESH</p></div>

<script>
    $(document).ready(function(){
        $("#box1").css({"height":"100px", "width":"100px", "background-color": "green",
                        "position":"absolute", "cursor":"pointer", "text-align":"center"});

        $("#box1").click(function(){
            $("#box1").animate({
                left: '250px',
                opacity: '0.5',
                height: '400px',
                width: '200px',
                color: 'red'
            });
        });
    });
</script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>