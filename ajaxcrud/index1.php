<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Document</title>
</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center text-primary">Ajax crud operation</h1>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                ADD
            </button>
        </div>
        <h2 class="text-danger">ALL RECORDS</h2>


        <div class=" record_contants" id="output">


        </div>
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ajax crud operation</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="fupForm" enctype="multipart/form-data">
                            <div class=" form-group">
                                <label>First name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="enter name"
                                    required>
                            </div>
                            <div class=" form-group">
                                <label>email</label>
                                <input type="Email" class="form-control" name="email" id="email"
                                    placeholder="enter email id" required>
                            </div>
                            <div class=" form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="password" required>
                            </div>
                            <div class=" form-group">
                                <input type="file" name="files" id="files">
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info" name="submit" id="submit">submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function(e) {

        $("#output").load("view.php");

        $('#fupForm').on('submit', function(e) {
            alert();
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'insert.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#image1').show();
                    $("#image1").delay(1500).fadeOut();
                },
                success: function(result) {
                    alert();
                    window.location.reload();
                    $("#form")[0].reset();
                    $('#myModal').modal('hide');

                }
            });
        });
    });

    $(document).on("click", "#delete", function() {
        var del = $(this);
        var id = $(this).attr("data-id");
        $.ajax({
            url: "delete.php",
            type: 'post',
            data: {
                id: id
            },
            success: function(d) {

            }
        });

    });
    </script>
</body>

</html>