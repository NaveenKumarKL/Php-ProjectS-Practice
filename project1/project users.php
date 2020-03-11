<?php
require 'includes/connection.php';


if (isset($_POST['upload'])) {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $sql = 'INSERT INTO users (name,role) VALUES (:name,:role)';
    $statem = $conn->prepare($sql);
    if ($statem->execute([':name' => $name, ':role' => $role])) {
        echo "upload sucessfull";
    }
}
?>




<?php require 'templates/header.php' ?>
<div class="container mt-5">
    <div class="card bg-light">
        <form action="#" method="post">
            <div class="form-group">
                <label for="name" class="ml-1">Name</label>
                <input class="form-control" type="text" placeholder="enter your name" name="name" value="" required>
            </div>
            <div class="form-group">
                <label for="for" class="ml-1">Role</label>
                <input class="form-control" type="text" placeholder="roll of person" name="role" value="" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mb-2" name="upload">submit</button>
            </div>
        </form>
    </div>
</div>

<?php require 'templates/footer.php' ?>