<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrovisor";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

// Validate inputs
if (empty($email) || empty($phone) || empty($password)) {
    die("Please fill in all fields.");
}

// Check user in database
$sql = "SELECT * FROM users WHERE email = ? AND phone = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $phone);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo "Login successful!";
    } else {
        echo "Invalid password.";
    }
} else {
    echo "User not found or phone number incorrect.";
}

$stmt->close();
$conn->close();
?>
