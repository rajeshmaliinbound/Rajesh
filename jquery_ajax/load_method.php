<?php include 'header.php'; ?>
<script>
    $(document).ready(function(){
        $("button").click(function(){
            $("#loadfile").load("demo_test.php");
        });
    });
</script>
<div id="loadfile"><h2> click on button to load external file</h2></div>
<button>get external file content</button>
<?php include 'footer.php'; ?>