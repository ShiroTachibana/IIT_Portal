<?php

$host = "localhost"; // Host name
$username = "root"; // MySQL username
$password = ""; // MySQL password
$dbname = "iitportal"; // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
