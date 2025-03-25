<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>
<h2>Display dimensions of Div Documentheight() & Documentwidth()</h2>
<button id="display">Document Width</button><br><br>
<p id="document"></p>
<p id="window"></p>
<p>https://www.quora.com/What-is-the-easiest-way-to-add-or-edit-data-on-JSON-files-using-JavaScript-or-PHP</p>

<script>
   $(document).ready(function(){
      $("#display").click(function(){
        let text = "";
        text += "Document Width is: " +$(document).width() +"<br>";
        text += "Document Height is: "+$(document).height() +"<br>";
        $("#document").html(text);
      });
   });
</script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>