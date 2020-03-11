<?php
require 'includes/connection.php';
$id = $_GET['id'];
$sql = 'DELETE FROM users WHERE id=:id';
$statem = $conn->prepare($sql);
if ($statem->execute([':id' => $id])) {
    header('location:index.php');
}