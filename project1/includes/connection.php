<?php
$dsn = 'mysql:host=localhost;dbname=project';

try {
    $conn = new PDO($dsn, 'root', '', []);
} catch (PDOException $e) {
}