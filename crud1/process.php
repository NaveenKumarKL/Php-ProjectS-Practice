<?php

session_start();

$id = 0;
$update = false;
$name = "";
$location = "";

$mysqli = new mysqli('localhost', 'root', '', 'crud1') or die(mysqli_error('$mysqli'));

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $mysqli->query("INSERT INTO users (name,location) values('$name','$location')") or die($mysqli->error);
    $_SESSION['message'] = "record has been saved";
    $_SESSION['msg_type'] = "success";
    header("location:index.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM users WHERE id=$id") or die($mysqli->error);
    $_SESSION['message'] = "record has been deleted";
    $_SESSION['msg_type'] = "danger";
    header("location:index.php");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM users WHERE id=$id") or die($mysqli->error);
    $row = $result->fetch_array();
    $name = $row['name'];
    $location = $row['location'];
}


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $mysqli->query("UPDATE users set name='$name', location='$location' WHERE id=$id") or die($mysqli->error);
    $_SESSION['message'] = "record has been updated";
    $_SESSION['msg_type'] = "warning";
    header("location:index.php");
}