<script>
$(document).ready(function(e) {
    $("form#projupForm").submit(function(event) {

        //disable the default form submission
        //event.preventDefault();

        //grab all form data  
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: 'update_project.php',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#loading-img1').show();
                $("#loading-img1").delay(1500).fadeOut();
            },
            success: function(result) {
                $('#alerty').show();
                $('#alerty').html(result);
                window.scrollTo(0, 0);
                $('#alerty').delay(1000).fadeOut(400);
                $('#projupForm').trigger("reset");
            }
        });

        return false;
    });
});
</script>