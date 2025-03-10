<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>
<p>All HTML elements have a static position, and cannot be moved.
     To manipulate the position, remember to first set the CSS position property
      of the element to relative, fixed, or absolute!</p>
<h2>Click the button multiple times to the animation</h2>

<button>Start Animation</button><br><br>

 <div id="box"></div>

 <script>
    $(document).ready(function(){
        $("#box").css({"background-color":"green","height":"100px","width":"100px","position":"absolute"});

        $("button").click(function(){
           var div = $("#box");
           div.animate({height:'400px', opacity:'0.8'},"slow");
           div.animate({width:'400px', opacity:'0.4'},"slow");
           div.animate({height:'100px', opacity:'0.8'},"slow");
           div.animate({width:'100px', opacity:'0.4'},"slow");
           div.animate({height:'0px', width:'0px'},"slow");
           div.animate({height:'100px', width: '100px',opacity:'0.9'},"slow");
           div.animate({left: '7.5%',opacity:'0.2'},"slow");
           div.animate({height:'400px', opacity:'0.8'},"slow");
           div.animate({width:'400px', opacity:'0.4'},"slow");
           div.animate({height:'100px', opacity:'0.8'},"slow");
           div.animate({width:'100px', opacity:'0.4'},"slow");
           div.animate({height:'0px', width:'0px'},"slow");
           div.animate({height:'100px', width: '100px',opacity:'0.9'},"slow");
        });
    });
 </script>
<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>