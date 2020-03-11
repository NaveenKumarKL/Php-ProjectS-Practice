<?php
$dsn = 'mysql:host=localhost;dbname=company';


try {
    $conn = new PDO($dsn, 'root', "", []);
} catch (PDOException $e) {
}