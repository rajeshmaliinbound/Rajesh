<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>
<button>Add toggleClass</button><br><br>
<div>
   <h2>This example of Add toggleClass</h2>
   <p>This is a Paragraph</p>
   <p>This is another Paragraph</p><br>
   <h5>Thank You!</h5>
</div>

<style>
    .box{
        height: 250px;
        width: 300px;
        border: 5px solid black;
        text-align: center;
        padding: 10px;
        margin: 150px 0px 0px 530px;
    }

    .h5s{
        font-size: 25px;
        color: green;
    }
</style>

<script>
    $(document).ready(function(){
        $("button").click(function(){
            $("div").toggleClass("box");
            $("h5").toggleClass("h5s");
        });
    })
</script>

<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>