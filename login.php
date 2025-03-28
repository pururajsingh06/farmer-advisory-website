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

// Check if form data is set
if (isset($_POST['email']) && isset($_POST['password'])) {

    // Get and sanitize form data
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        // Check user in database using Prepared Statement
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
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
        } else {
            echo "Database query failed.";
        }
    }
} else {
    echo "Form not submitted correctly.";
}

$conn->close();
?>
