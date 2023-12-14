<?php
$host = "localhost";
$username = "root";  // Default MySQL username
$password = "";      // Empty password for XAMPP
$database = "enrollment_system";


$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
