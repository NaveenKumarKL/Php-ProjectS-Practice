<?php
include 'connection.php';

if (isset($_REQUEST['id'])) {

    $id = $_REQUEST['id'];
    $query = "SELECT * FROM users WHERE id=:id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch();
}

?>

<form id="1form" enctype="multipart/form-data">
    <div class=" form-group">
        <input type="hidden" name="updateid" id="updateid" value="<?php echo $row["id"]; ?>">
        <label>First name</label>
        <input type="text" class="form-control" name="updatename" id="updatename" placeholder="enter name"
            value="<?php echo $row["name"]; ?>" required>
    </div>
    <div class=" form-group">
        <label>email</label>
        <input type="email" class="form-control" name="updateemail" id="updateemail" placeholder="enter email id"
            value="<?php echo $row["email"]; ?>" required>
    </div>
    <div class=" form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="updatepassword" id="updatepassword" placeholder="password"
            value="<?php echo $row["password"]; ?>" required>
    </div>
    <div class=" form-group">
        <input type="file" name="ufiles" id="ufiles">
    </div>
    <div class=" form-group">
        <button type="submit" class="btn btn-danger" name=" update" id="update">update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(event) {

    // $("#update").click(function() {
    //     alert();
    $('#1form').on('submit', function(event) {

        event.preventDefault();
        $.ajax({
            url: "update.php",
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(d) {
                alert(d);
                window.location.reload()

            }
        });
    });
});
</script>