<?php 

$dsn = "mysql:host=localhost;dbname=workspace;charset=utf8mb4;port=3006";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "". $e->getMessage();
}
