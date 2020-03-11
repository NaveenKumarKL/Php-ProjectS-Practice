<?php
$dsn = 'mysql:host=localhost;dbname=ajax';


try {
    $conn = new PDO($dsn, 'root', "", []);
} catch (PDOException $e) {
}