<?php require 'header.php'; ?>
<?php
session_start();
require 'db.php';

$userprofile = $_SESSION['email'];

if ($userprofile == true) {
    echo "welcome " . $_SESSION['email'];
    echo "welcome " . $_SESSION['timestamp'];
    if ((time() - $_SESSION['timestamp']) > 30) {
        header('location:login.php');
    }
} else {
    header('location:login.php');
}


$sql = 'SELECT * FROM people';
$statem = $conn->prepare($sql);
$statem->execute();
$people = $statem->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <div style="float: left">
                <h2>All people</h2>
            </div>
            <div style="float: right">
                <a href="create.php"><button type="submit" class="btn btn-info">Add</button></a>
                <a href="logout.php"><button type="submit" class="btn btn-info">logout</button></a>
            </div>
        </div>


        <div class="card-body m-1">
            <table class="table table-bordered ">
                <tr>
                    <th>sl.no</th>
                    <th>name</th>
                    <th>email</th>
                    <th>password</th>
                    <th>gender</th>
                    <th>images</th>
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
                    <td><?= $person->gender; ?></td>
                    <td><img src="<?= $person->images; ?>" /></td>
                    <td>
                        <a class="btn btn-info" href="edit.php?id=<?= $person->id ?>">Edit</a>
                        <a onclick="return confirm('are you sure want to delete this entry')" class="btn btn-danger"
                            href="delete.php?id=<?= $person->id ?>">delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>


<?php require 'footer.php'; ?>