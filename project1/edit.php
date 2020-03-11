<?php
require 'includes/connection.php';

$id = $_GET['id'];
$sql = 'SELECT * FROM users WHERE id=:id';
$statem = $conn->prepare($sql);
$statem->execute([':id' => $id]);
$person = $statem->fetch(PDO::FETCH_OBJ);

if (isset($_POST['upload'])) {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $sql = 'UPDATE users SET name=:name, role=:role WHERE id=:id';
    $statem = $conn->prepare($sql);
    if ($statem->execute([':name' => $name, ':role' => $role, ':id' => $id])) {
        header('location:index.php');
    }
}
?>




<?php require 'templates/header.php' ?>
<div class="container mt-5">
    <div class="card bg-light">
        <form action="" method="post">
            <div class="form-group">
                <label for="name" class="ml-1">Name</label>
                <input class="form-control" type="text" placeholder="enter your name" name="name"
                    value="<?= $person->name; ?>" required>
            </div>
            <div class="form-group">
                <label for="for" class="ml-1">Role</label>
                <input class="form-control" type="text" placeholder="roll of person" name="role"
                    value="<?= $person->role; ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mb-2" name="upload">upload</button>
            </div>
        </form>
    </div>

</div>

<?php require 'templates/footer.php' ?>