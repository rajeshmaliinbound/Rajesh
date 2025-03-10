<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>
    <button id="btn1">Prepended Paragraph</button>
    <button id="btn2">Prepended lidt Item</button>

    <p>This is a 1st paragraph</p>
    <p>This is a 2nd Paragraph</p>

    <ol>
        <li>List Item</li>
        <li>List Item</li>
        <li>List Item</li>
    </ol>

    <script>
        $("#btn1").click(function(){
            $("p").prepend("<b>Prepend Paragraph ");
        });

        $("#btn2").click(function(){
            $("ol").prepend("<li>Prepend List Item</li>");
        });
    </script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>