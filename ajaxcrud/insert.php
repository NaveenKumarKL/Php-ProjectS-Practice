<?php

include 'connection.php';


if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $file = $_FILES['files']['name'];
    $tfile = $_FILES['files']['tmp_name'];
    $folder = "images/" . $file;
    move_uploaded_file($tfile, $folder);


    $sql = "INSERT INTO users(name,email,password, file)values(:name,:email,:password, :file)";

    $statem = $conn->prepare($sql);

    $statem->bindParam(':name', $name, PDO::PARAM_STR);
    $statem->bindParam(':email', $email, PDO::PARAM_STR);
    $statem->bindParam(':password', $password, PDO::PARAM_STR);
    $statem->bindParam(':file', $folder, PDO::PARAM_STR);


    $statem->execute();
}