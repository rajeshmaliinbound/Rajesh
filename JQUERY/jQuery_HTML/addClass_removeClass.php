<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>
<button id="addClass">AddClass</button>
<button id="removeClass">removeClass</button><br><br>

<div>
    <h2>This example of addClass</h2>
    <p>This is a paragraph</p>
    <p>This is a another Paragraph</p>
</div>

<style>
    .box{
        text-align: center;
        color: red;
        padding: 10px;
        border: 1px solid red;
        margin: 250px;
    }
</style>

<script>
$(document).ready(function(){

    $("#addClass").click(function(){
        $("div").addClass("box");
    });

    $("#removeClass").click(function(){
        $("div").removeClass("box");
    });
});
</script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>