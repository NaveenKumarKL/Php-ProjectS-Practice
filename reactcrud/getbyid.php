<?php
require 'connection.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$data = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($data);




echo json_encode($row);

exit;