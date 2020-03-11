<?php
include 'connection.php';

$sql = "SELECT * from users ";
$statem = $conn->prepare($sql);
$statem->execute();
$people = $statem->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <table id="example23" class="table">
            <tr>
                <th>sl.mo</th>
                <th>name</th>
                <th>email</th>
                <th>password</th>
                <th>file</th>
                <th>action</th>
            </tr>
            <?php
            $num = 1;
            ?>
            <?php foreach ($people as $person) : ?>
            <tr>
                <td><?= $num++ ?></td>
                <td><?= $person->name; ?></td>
                <td><?= $person->email; ?></td>
                <td><?= $person->password; ?></td>
                <td><img src="<?= $person->file; ?>" width="100" height="100"></td>

                <td>
                    <!-- <a class="btn btn-info" href="" id="edit" data-id=<?= $person->id ?>">Edit</a> -->
                    <button type="button" class="btn btn-info getUser" id="edit" data-toggle="modal"
                        data-target="#updateModal" data-id='<?= $person->id ?>'>
                        Edit
                    </button>
                    <a onclick="return confirm('are you sure want to delete this entry')" class="btn btn-danger"
                        id="delete" href="" data-id='<?= $person->id ?>'>delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <!-- update model -->
        <div class="container">


            <!-- The Modal -->
            <div class="modal fade" id="updateModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Modal Heading</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div id="dynamic-content"></div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal" name="update"
                                id="update">update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script>
    // $(document).ready(function() {
    //     $('#edit').click(function() {

    //     });

    // });
    </script>

    <script type="text/javascript">
    $(document).ready(function(e) {
        $('#example23').on('click', '.getUser', function() {

            //e.preventDefault();
            var id = $(this).data('id'); // it will get id of clicked row         

            $('#dynamic-content').html(''); // leave it blank before ajax call


            $.ajax({
                    url: 'edit.php',
                    type: 'post',
                    data: {
                        id: id
                    },
                    dataType: 'html'
                })
                .done(function(data) {
                    console.log(data);
                    $('#dynamic-content').html('');
                    $('#dynamic-content').html(data); // load response

                })
                .fail(function() {
                    $('#dynamic-content').html(
                        '<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...'
                    );

                });

        });

    });
    </script>



</body>

</html>