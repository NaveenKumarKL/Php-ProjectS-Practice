<?php
require 'db.php';
error_log(0);
$message = "";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $images = $_FILES['images']['name'];
    $timages = $_FILES['images']['tmp_name'];
    $folder = "images/" . $images;
    move_uploaded_file($timages, $folder);

    $sql = 'INSERT INTO people(name,email,password,gender,images)values(:name,:email,:password,:gender,:images)';
    $statem = $conn->prepare($sql);

    if ($statem->execute([':name' => $name, ':email' => $email, ':password' => $password, ':gender' => $gender, ':images' => $folder])) {
        $message = 'data inserted sucessfully';
    }
}

?>

<?php require 'header.php'; ?>
<div class="container ">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Create a person</h2>
        </div>
        <div class="card-body">
            <?php if (!empty($message)) : ?>
            <div class="alert alert-success">
                <?= $message; ?>
            </div>
            <?php endif; ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" id="email" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" class="form-control" value="" required>
                </div>
                <div class="form-check">
                    <input type="radio" name="gender" id="email" class="form-check-input" value="male">
                    <label class="form-check-label" for="exampleRadios1">
                        Male
                    </label><br>
                    <input type="radio" name="gender" id="email" class="form-check-input" value="female">
                    <label class="form-check-label" for="exampleRadios1">
                        Female
                    </label><br>
                </div><br>
                <div class="input-group">
                    <input type="file" name="images" id="images">
                </div><br><br>
                <div class="form-group">
                    <button type="submit" name='submit' class="btn btn-info">create a person</button>
                </div>
            </form>
        </div>
    </div>

</div>
<?php require 'footer.php'; ?>