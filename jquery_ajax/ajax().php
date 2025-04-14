<?php include 'header.php'; ?>
<script>
    $(document).ready(function(){
        $("button").click(function(){
            $.ajax({url: "demo_test.php", success: function(result){
                $("#loadfile").html(result);
            }});
        });
    });
</script>
<div id="loadfile"><h2> Click on button to load external file</h2></div>
<button>get external file content</button>
<?php include 'footer.php'; ?>