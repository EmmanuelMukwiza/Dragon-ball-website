<?php

$servername = "localhost";
$username = "bit_academy";
$password = "";
$dbname = "dragonball";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sql = "SELECT * FROM character_info";
$result = $conn->query($sql);
$dragonball_data = $result->fetchAll(PDO::FETCH_ASSOC);
