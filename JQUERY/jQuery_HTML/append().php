<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>

<div>
<button id="btn1">Append paragraph</button>
<button id="btn2">Append List item</button><br><br>
    <p>This is a first paragraph</p>
    <p>This is a Second paragraph</p>

    <ol>
        <li>list item 1</li>
        <li>List item 2</li>
        <li>List item 3</li>
    </ol>
</div>

<script>
    $(document).ready(function(){
        $("#btn1").click(function(){
            $("p").append("<b> Append Paragraph</b>");
        });

        $("#btn2").click(function(){
            $("ol").append("<li>Append list Item</li>");
        });
    });
</script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>