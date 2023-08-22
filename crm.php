<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen">
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-white text-2xl font-semibold">CRM Dashboard</h1>
            <a href="?logout=true" class="text-white">Logout</a>
        </div>
    </nav>
    <div class="container mx-auto py-8">
        <div class="grid grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded shadow-md">
                <h2 class="text-lg font-semibold mb-4">Contacts</h2>
                <ul>
                    <li class="mb-2">John Doe</li>
                    <li class="mb-2">Jane Smith</li>
                    <li class="mb-2">Michael Johnson</li>
                </ul>
            </div>
            <div class="bg-white p-6 rounded shadow-md">
                <h2 class="text-lg font-semibold mb-4">Tasks</h2>
                <ul>
                    <li class="mb-2">Meeting with Client A</li>
                    <li class="mb-2">Follow-up Email to Leads</li>
                    <li class="mb-2">Prepare Presentation for Conference</li>
                </ul>
            </div>
            <div class="bg-white p-6 rounded shadow-md">
                <h2 class="text-lg font-semibold mb-4">Analytics</h2>
                <p>Total Revenue: $100,000</p>
                <p>New Customers: 50</p>
                <p>Active Projects: 10</p>
            </div>
        </div>
    </div>
</body>
</html>
