<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("db_connect.php"); // Ensure this file exists!

if ($conn) {
    echo "✅ Database connected successfully!";
} else {
    echo "❌ Database connection failed!";
}
?>
