<?php
$db_host = 'database-1.ckt6vj6xq4up.eu-west-3.rds.amazonaws.com';
$db_name = 'itrack';
$db_user = 'admin';
$db_pass = 'Sedannfr95';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: crm.php");
            exit();
        } else {
            $error_message = "Invalid credentials";
        }
    } else {
        $error_message = "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-4">Login</h2>
        <form method="POST">
            <div class="mb-4">
                <label for="username" class="block font-medium mb-1">Username</label>
                <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block font-medium mb-1">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Login</button>
        </form>
    </div>
</body>
</html>
