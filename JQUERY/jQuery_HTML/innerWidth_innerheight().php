<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>
<button id="display">Display dimensions of Div innerwidth() & innerheight()</button><br><br>
<div id="box1">
   
</div>

<style>
    #box1{
        height: 100px;
        width: 400px;
        border: 2px solid black;
        background-color: pink;
        text-align: center;
    }
</style>

<script>
    $(document).ready(function(){
        $("#display").click(function(){
            let txt = "";
            txt1 = "";
            txt += "innerwidth of Div: " + $("#box1").width() +"<br>";
            txt += "innerheight of div: " +$("#box1").height();
            $("div").html(txt);            
        })
    })
</script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>