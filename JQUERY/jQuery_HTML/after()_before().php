<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>

<button id="btn1"> Add Before</button>
<button id="btn2">Add After</button><br><br>

<img src="https://www.w3schools.com/images/w3jquery.gif" alt="img" width="100" height="140"><br><br>

 <script>
   $(document).ready(function(){

        $("#btn1").click(function(){
            $("img").before("<b>Insert Before</b>");
        });

        $("#btn2").click(function(){
            $("img").after("<i>Insert After</i>");
        });

   });
 </script>

<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>