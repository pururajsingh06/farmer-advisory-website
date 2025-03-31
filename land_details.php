<?php
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $land_area = $_POST["land_area"];
    $soil_type = $_POST["soil_type"];

    $sql = "INSERT INTO land_details (user_id, land_area, soil_type) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ids", $user_id, $land_area, $soil_type);

    if ($stmt->execute()) {
        echo "Land details saved!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
