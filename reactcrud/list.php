<?php
require 'connection.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

$users = [];
$sql = "SELECT * FROM users";

if ($result = mysqli_query($conn, $sql)) {
    $cr = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $users[$cr]['id'] = $row['id'];
        $users[$cr]['Fname'] = $row['fname'];
        $users[$cr]['Email'] = $row['uname'];
        $users[$cr]['Password'] = $row['password'];
        $cr++;
    }
    echo json_encode($users);
} else {
    http_response_code(404);
}