<?php

include 'connection.php';



if (isset($_POST['updateid'])) {
    $id = $_POST['updateid'];
    $name = $_POST['updatename'];
    $email = $_POST['updateemail'];
    $password = $_POST['updatepassword'];
    $file = $_FILES['ufiles']['name'];
    $tfile = $_FILES['ufiles']['tmp_name'];
    $folder = "images/" . $file;
    move_uploaded_file($tfile, $folder);

    $sql = "UPDATE users SET name=:name,email=:email,password=:password,file=:file where id=:id";

    $statem = $conn->prepare($sql);

    $statem->bindParam(':id', $id, PDO::PARAM_STR);
    $statem->bindParam(':name', $name, PDO::PARAM_STR);
    $statem->bindParam(':email', $email, PDO::PARAM_STR);
    $statem->bindParam(':password', $password, PDO::PARAM_STR);
    $statem->bindParam(':file', $folder, PDO::PARAM_STR);

    $statem->execute();
}