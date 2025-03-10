<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>
<button id="empty">Empty Div</button>
<button id="remove">Remove Div</button><br><br>

<div id="box" style="height: 200px; width: 350px; border: 1px solid black; padding: 20px">
    <h2>Example of remove() or empty() method</h2>
    <p> This is a first paragraph</p>
    <p> This is a first paragraph</p>
    <p> This is a first paragraph</p>
</div>

<script>
    $(document).ready(function(){

        $("#empty").click(function(){
            $("#box").empty();
        })

        $("#remove").click(function(){
            $("#box").remove();
        });

    });
</script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>