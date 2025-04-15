<?php include 'header.php'; ?>
<script>
    $(document).ready(function(){
        $("input").keyup(function(){
            var txt = $("input").val();
            $.post("demo_ajax_gethint.txt", {suggest: txt}, function(result){
            $("span").html(result);
            });
        });
    });
</script>

<p>Start typing a name in the input field below:</p>

<input type="text">
<p>Suggestions: <span></span></p>
<?php include 'footer.php'; ?>