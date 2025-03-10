<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>
<h3>Get Content and Attributes using text(), html()</h3>
<p id="txt">there is some <b>bold</b> text in paragraph</p>
<button id="btn1">Show Text</button>
<button id="btn2">Show Html</button>

<script>
    $(document).ready(function(){
        $("#btn1").click(function(){
            alert("Text: " + $("p").text());
        });

        $("#btn2").click(function(){
            alert("HTML:" + $("p").html());
        });
    });
</script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>