<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";      // XAMPP default host
$user = "root";           // Default MySQL user
$password = "";           // Default password (empty in XAMPP)
$database = "farmer_advisory"; // Database name

// Create a connection
$conn = new mysqli($host, $user, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Database connected successfully!";
?>
