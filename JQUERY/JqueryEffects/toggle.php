<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>
<button>toggle</button>
<p>Toggle between hiding and showing the paragraphs</p>
<p>Toggle between hiding and showing the paragraphs</p>

<script>
    $(document).ready(function(){
        $("button").click(function(){
          $("h2").show();
        },function(){
            $("p").toggle(500);
        });
    });
</script>

<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>