<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// get connection parameter from env
$servername = "mysql";
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DATABASE');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from time_zone_name limit 50";
$result = $conn->query($sql);

if ($result) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    print json_encode($rows);
} else {
    print json_encode([]);
}

$conn->close();