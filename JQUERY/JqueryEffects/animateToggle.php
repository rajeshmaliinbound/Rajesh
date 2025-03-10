<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>

<p>Click the button multiple times to toggle the animation.</p>

<button>Start Animation</button>

<p>All HTML elements have a static position, and cannot be moved.
     To manipulate the position, remember to first set the CSS position property
      of the element to relative, fixed, or absolute!</p>
 <div id="box"></div>

 <script>
    $(document).ready(function(){
        $("#box").css({"background-color":"green","height":"400px","width":"400px","position":"absolute"});

        $("button").click(function(){
            $("#box").animate({
                height: 'toggle',
                width: 'toggle',
            });
        });
    });
 </script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>