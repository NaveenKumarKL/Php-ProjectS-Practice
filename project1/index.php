<?php require 'includes/connection.php';
error_log(0);
$sql = 'SELECT * FROM users ORDER BY id DESC';
$statem = $conn->prepare($sql);
$statem->execute();
$users = $statem->fetchAll(PDO::FETCH_OBJ);
?>
<?php require 'templates/header.php'; ?>
<div class="container">
    <div class="card mt-3">
        <div class="card-header">
            <h2>Users</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover ">
                <thead>
                    <tr>
                        <th scope="col">SL.no</th>
                        <th scope="col">name</th>
                        <th scope="col">role</th>
                        <th scope="col">project view</th>
                        <th scope="col">action</th>
                    </tr>

                </thead>

                <?php

                $num = 1;

                ?>
                <?php foreach ($users as $person) : ?>
                <tr>
                    <td scope="row"><?= $num++; ?></td>
                    <td><?= $person->name ?></td>
                    <td><?= $person->role ?></td>
                    <th> <a class="btn btn-info " href="#.php?id=<?= $person->id ?>">view projects</a></th>
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


<?php require 'templates/footer.php'; ?>