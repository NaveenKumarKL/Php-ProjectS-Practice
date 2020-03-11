<?php
include 'connection.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = 'DELETE FROM users WHERE id=:id';
    $statem = $conn->prepare($sql);
    $statem->bindParam(':id', $id, PDO::PARAM_STR);
    $statem->execute();
}