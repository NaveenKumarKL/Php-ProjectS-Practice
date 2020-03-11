<?php require 'includes/connection.php';


$sql = 'SELECT name,id FROM users';
$statem = $conn->prepare($sql);
$statem->execute();
$users = $statem->fetchAll(PDO::FETCH_OBJ);


if (isset($_POST['submit'])) {
    $ptitle = $_POST['ptitle'];
    $ptype = $_POST['ptype'];
    $user = $_POST['user'];
    echo $user;
}
?>

<?php require 'templates/header.php' ?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2> Upload projects</h2>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="pname">project title</label>
                    <input type="text" class="form-control" name="ptitle" value="">
                </div>
                <div class="form-group">
                    <label for="pname">project type</label>
                    <input type="text" class="form-control" name="ptype" value="">
                </div>
                <div class="form-group">
                    <label for="user">users-name</label>
                    <select class="form-control" id="user" name="user">
                        <?php foreach ($users as $person) : ?>
                        <option value="<?= $person->id ?>"><?= $person->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info" name="submit">submit</button>
                </div>
        </div>
        </form>

    </div>
</div>

</div>


<?php require 'templates/footer.php' ?>