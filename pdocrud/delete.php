<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'DELETE FROM people WHERE id=:id';
    $statem = $conn->prepare($sql);
    if ($statem->execute([':id' => $id])) {
        header('location:index.php');
    }
}