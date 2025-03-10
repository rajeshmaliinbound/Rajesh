<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>
<h2>Example of chang</h2>
<p id="textset">this is for text</p>
<p id="htmlset">this is for html</p>
<p>Input: <input type="text" value="This is a input field" id="Input"></p>

<button id="btn1">set text</button>
<button id="btn2">set HTML</button>
<button id="btn3">set Value</button>

<script>
    $(document).ready(function(){
        $("#btn1").click(function(){
           $("#textset").text("This is text")
        });

        $("#btn2").click(function(){
            $("#htmlset").html("<b>this is html<b>");
        });

        $("#btn3").click(function(){
          $("#Input").val("Rajesh Mali");
        })

    });
</script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>