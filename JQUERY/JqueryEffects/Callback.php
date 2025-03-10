<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>
<h2>example of callback parameter...</h2>
<button>hide this paragraph</button>
<p>This is a Paragraph</p>

<script>
    $(document).ready(function(){
       $("button").click(function(){
        $("p").hide("slow", function(){
            alert("Paragraph now hidden");
        });
       });
    });
</script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>