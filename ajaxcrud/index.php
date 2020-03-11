<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center text-primary">Ajax crud operation</h1>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mymodel"
                data-whatever="@mdo">ADD</button>
        </div>
        <h2 class="text-danger">ALL RECORDS</h2>


        <div class=" record_contants" id="output">


        </div>


        <div class="modal fade" id="mymodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="fupForm" enctype="multipart/form-data">
                        <div class="modal-body">
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

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>

        <script type="text/javascript">
        $(document).ready(function(event) {

            $("#output").load("view.php");

            $('#fupForm').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'insert.php',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        alert(data);
                        window.location.reload();
                        // $("#form")[0].reset();
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