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

// Get and sanitize form data
$email = trim($_POST['email']);
$password = $_POST['password'];

// Validate inputs
if (empty($email) || empty($password)) {
    die("Error: Both email and password are required.");
}

// Check user in database using Prepared Statement
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo "✅ Login successful!";
    } else {
        echo "❌ Invalid password.";
    }
} else {
    echo "❌ User not found.";
}

$stmt->close();
$conn->close();
?>
