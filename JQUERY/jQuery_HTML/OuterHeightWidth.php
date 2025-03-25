<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>
<h2>Display dimensions of Div outerheight() & OuterWidth()</h2>
<button id="display">Display Outer Height Width</button><br><br>
<div id="box1"></div>

<style>
    #box1 {
    height: 100px;
    width: 300px;
    padding: 10px;
    margin: 3px;
    border: 1px solid blue;
    background-color: lightblue;
    }
</style>

<script>
    $(document).ready(function(){
        $("#display").click(function(){
            let text;
            text += "OuterWidth of div: " +$("#box1").outerWidth() +"<br>";
            text += "OuterHeight of div: " +$("#box1").outerHeight() +"<br>";
            $("#box1").html(text);
        });
    })
</script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>