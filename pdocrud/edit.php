<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM people WHERE id=:id';
$statem = $conn->prepare($sql);
$statem->execute([':id' => $id]);
$person = $statem->fetch(PDO::FETCH_OBJ);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $images = $_FILES['images']['name'];
    $timages = $_FILES['images']['tmp_name'];
    $folder = "images/" . $images;
    move_uploaded_file($timages, $folder);
    $sql = 'UPDATE people SET name=:name, email=:email, password=:password, gender=:gender,images=:images WHERE id=:id';
    $statem = $conn->prepare($sql);
    if ($statem->execute([':name' => $name, ':email' => $email, ':password' => $password, ':gender' => $gender, ':images' => $folder, ':id' => $id])) {
        header('location:index.php');
    }
}

?>

<?php require 'header.php'; ?>
<div class="container ">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update a person</h2>
        </div>
        <div class="card-body">
            <?php if (!empty($message)) : ?>
            <div class="alert alert-success">
                <?= $message; ?>
            </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $person->name; ?>">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= $person->email; ?>">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" class="form-control"
                        value="<?= $person->password; ?>" required>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="radio" name="gender" id="email" class="form-check-input" value="male" <?php if ($person->gender == "male") {
                                                                                                                echo "checked";
                                                                                                            } ?>>
                        <label class="form-check-label" for="exampleRadios1">
                            Male
                        </label><br>
                        <input type="radio" name="gender" id="email" class="form-check-input" value="female" <?php if ($person->gender == "female") {
                                                                                                                    echo "checked";
                                                                                                                } ?>>
                        <label class="form-check-label" for="exampleRadios1">
                            Female
                        </label><br>

                    </div><br>
                </div>
                <div class="input-group">
                    <input type="file" name="images" id="images">
                </div><br><br>
                <div class="form-group">
                    <button type="submit" name='submit' class="btn btn-info">Update a person</button>
                </div>
            </form>
        </div>
    </div>

</div>
<?php require 'footer.php'; ?>