<?php
session_start();
include("db_connect.php"); // Ensure database connection is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $password = isset($_POST['password']) ? trim($_POST['password']) : "";

    // Basic validation
    if (empty($name) || empty($email) || empty($password)) {
        die("❌ Error: All fields are required!");
    }

    // Check if email already exists
    $email = mysqli_real_escape_string($conn, $email);
    $checkEmailQuery = "SELECT id FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $checkEmailQuery);

    if (!$result) {
        die("❌ Error in query: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        die("❌ Error: Email already registered!");
    }

    // Hash the password before storing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

    if (mysqli_query($conn, $query)) {
        echo "✅ Registration successful! Redirecting to login...";
        header("Refresh: 2; URL=login.html");
        exit();
    } else {
        die("❌ Registration failed: " . mysqli_error($conn));
    }
} else {
    die("405 Method Not Allowed! Use POST request.");
}
?>
