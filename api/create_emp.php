<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// get connection parameter from env
$servername = "mysql";
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_EMP_DATABASE');

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// If database is not exist create one
if (!mysqli_select_db($conn, $dbname)) {
    $sql = "CREATE DATABASE " . $dbname;
    if ($conn->query($sql) !== TRUE) {
        echo "Error creating database: " . $conn->error;
    }
}

$conn2 = new mysqli($servername, $username, $password, $dbname);

$sql = "CREATE TABLE IF NOT EXISTS employee (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL
    )";
if ($conn2->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn2->error;
}


$sql = "INSERT INTO employee (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";

if ($conn2->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn2->error;
}


$conn->close();
$conn2->close();

