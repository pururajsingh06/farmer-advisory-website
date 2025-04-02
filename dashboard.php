<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include database connection (if needed)
include("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroVisor | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navigation Bar -->
    <nav class="bg-green-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between">
            <a href="#" class="text-lg font-bold">AgroVisor</a>
            <div>
                <a href="crop-management.html" class="px-4 hover:underline">🌱 Crop Management</a>
                <a href="advisory.html" class="px-4 hover:underline">📊 Advisory</a>
                <a href="logout.php" class="px-4 bg-red-600 text-white px-3 py-1 rounded">🚪 Logout</a>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container mx-auto px-6 pt-20 pb-10">
        <h2 class="text-3xl font-bold text-green-700 mb-6 text-center">Welcome to AgroVisor, <?php echo $_SESSION['username']; ?>! 👨‍🌾</h2>

        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <p class="text-gray-600">Explore the available features:</p>
            <ul class="mt-4 text-blue-600">
                <li><a href="crop-management.html" class="hover:underline">🌱 Crop Management</a></li>
                <li><a href="advisory.html" class="hover:underline">📊 Agricultural Advisory</a></li>
                <li><a href="logout.php" class="text-red-600 hover:underline">🚪 Logout</a></li>
            </ul>
        </div>
    </div>

</body>
</html>
