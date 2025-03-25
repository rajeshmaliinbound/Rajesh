<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>
<h2>Display dimensions of Div Window Width & Height</h2>
<button id="display">Window Width</button><br><br>
<p id="document"></p>
<p id="window"></p>

<script>
   $(document).ready(function(){
      $("#display").click(function(){
        let text = "";
        text += "Window Width is: " +$(document).width() +"<br>";
        text += "Window Height is: "+$(document).height() +"<br>";
        $("#document").html(text);
      });
   });
</script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>