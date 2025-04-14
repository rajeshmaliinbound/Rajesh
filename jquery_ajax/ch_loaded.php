<?php include 'header.php'; ?>
<script>
    $(document).ready(function(){
        $('#loaded').on('click', function(event) {
            event.preventDefault();

            $.ajax({
                url: this.href,
                headers: {
                "Authorization": "Bearer YOUR_TOKEN_HERE",
                "X-Custom-Header": "CustomValue"
                },
                success: function(data) {
                $('#main').html($(data).find('#main *'));
                $('#loadfile').text('The page has been successfully loaded with custom headers');
                },
                error: function() {
                $('#loadfile').text('An error occurred while loading the page with custom headers');
                }
            });
        })
    });
</script>
<div id="loadfile"></div>
<div><h3 id="main"></h3></div>
<button id="loaded">Click me</button>
<?php include 'footer.php'; ?>