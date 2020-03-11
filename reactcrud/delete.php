<?php
require 'connection.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

$id = $_GET['id'];
echo  $sql = "DELETE FROM users WHERE id='{$id}'";

if (mysqli_query($conn, $sql)) {
    http_response_code(204);
} else {
    return http_response_code(422);
}