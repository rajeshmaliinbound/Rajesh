<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>
<h2>Display dimensions of Div Documentheight() & Documentwidth()</h2>
<button id="display">Document Width</button><br><br>
<p id="document"></p>
<p id="window"></p>

<script>
   $(document).ready(function(){
      $("#display").click(function(){
        let text = "";
        text += "Document Width is: " +$(document).width() +"<br>";
        text +=
        $("#document").html(text);
      })
   });
</script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>