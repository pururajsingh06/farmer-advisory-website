<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
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
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-lg font-bold">AgroVisor</a>
            <button id="menu-btn" class="md:hidden block text-white focus:outline-none">
                ☰
            </button>
            <div id="menu" class="hidden md:flex space-x-4">
                <a href="crop-management.html" class="hover:underline">🌱 Crop Management</a>
                <a href="advisory.html" class="hover:underline">📊 Advisory</a>
                <a href="logout.php" class="bg-red-600 px-3 py-1 rounded">🚪 Logout</a>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container mx-auto px-4 md:px-6 pt-20 pb-10 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-green-700 mb-6">Welcome to AgroVisor, <?php echo $_SESSION['username']; ?>! 👨‍🌾</h2>

        <div class="bg-white p-6 md:p-10 rounded-lg shadow-lg">
            <p class="text-gray-600">Explore the available features:</p>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="crop-management.html" class="block p-4 bg-green-200 rounded hover:bg-green-300">🌱 Crop Management</a>
                <a href="advisory.html" class="block p-4 bg-blue-200 rounded hover:bg-blue-300">📊 Agricultural Advisory</a>
                <a href="logout.php" class="block p-4 bg-red-200 rounded hover:bg-red-300">🚪 Logout</a>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("menu-btn").addEventListener("click", function() {
            document.getElementById("menu").classList.toggle("hidden");
        });
    </script>

</body>
</html>
