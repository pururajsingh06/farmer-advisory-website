<?php
session_start();
include("db_connect.php"); // Ensure this file exists

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $password = isset($_POST['password']) ? trim($_POST['password']) : "";

    if (empty($email) || empty($password)) {
        die("Error: Email and password are required!");
    }

    // Prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);

    // Check if user exists
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error in query: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            header("Location: dashboard.php");
            exit();
        } else {
            die("Invalid email or password!");
        }
    } else {
        die("User not found!");
    }
} else {
    die("405 Method Not Allowed! Use POST request.");
}
?>
