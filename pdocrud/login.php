<?php
session_start();
require 'db.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM people WHERE email ='$email' && password ='$password'";
    $statem = $conn->prepare($query);
    $statem->execute(array($email, $password));
    $count = $statem->rowCount();
    if ($count == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['timestamp'] = time();
        header('location:index.php');
    } else {
        echo "please enter email and password correctly";
    }
}
?>

<?php

require 'header.php';

?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>User Name</h2>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" name="email" id="">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="Password" class="form-control" name="password" id="">
                </div>
                <div class="form-group">
                    <button class="btn btn-info" name="submit">Login</button>
                </div>
            </form>
        </div>
    </div>

</div>
<?php require 'footer.php'; ?>