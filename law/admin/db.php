<?php
$servername = "localhost";
$username = "journals";
$password = "journals*001";

try {
    $conn = new PDO("mysql:host=$servername;dbname=jugde", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
