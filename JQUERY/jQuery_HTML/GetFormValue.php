<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\header.php'; 
?>

<h2>Get Form Value</h2>
<form action="">
    Name:<input type="text" id="Name"><br><br>
    Email: <input type="text" id="Email"><br><br>
    Contact: <input type="text" id="Phone"><br><br>
    <button type="submit" id="btn">Get all Values</button>
</form>

<script>
    $(document).ready(function(){
        $("#btn").click(function(){
            let Name = $("#fName").val();
            alert("Name: " + $("#Name").val() +"\nEmail: " + $("#Email").val() +"\nContact: " + $("#Phone").val());
        });
    });
</script>

<?php
 include 'C:\xampp\htdocs\Inbound-Webhub\JQUERY\footer.php';
?>