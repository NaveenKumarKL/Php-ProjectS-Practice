<?php
require 'connection.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");


$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {

    $request = json_decode($postdata);
    $Fname = $request->Fname;
    $Email = $request->Email;
    $Password = $request->Password;
    // $gender = $_POST['gender'];

    // $images = $_FILES['images']['name'];
    // $timages = $_FILES['images']['tmp_name'];
    // $folder = "images/" . $images;
    // move_uploaded_file($timages, $folder);

    $query = "INSERT INTO users (fname,uname,password) values( '$Fname','$Email','$Password')";
    $data = mysqli_query($conn, $query);
}