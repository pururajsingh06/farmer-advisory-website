<?php
include "db_connect.php";

$sql = "SELECT * FROM market_prices ORDER BY last_updated DESC";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
?>
