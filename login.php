<?php
session_start();

// Database credentials
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "aqi";

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data and escape it
$username = $conn->real_escape_string($_POST['username'] ?? '');
$password = $conn->real_escape_string($_POST['loginPass'] ?? '');

// Query using correct column names including typo
$sql = "SELECT * FROM user WHERE name = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result && $result->num_rows === 1) {
    $row = $result->fetch_assoc();

    // Set session variables using 'perferable_color'
    $_SESSION['username'] = $row['name'];
    $_SESSION['perferable_color'] = $row['perferable_color']; // keep the typo as it is in DB

    header("Location: requestAQI.php");
    exit();
} else {
    echo '
    <div style="text-align: center; margin-top: 50px;">
        <p style="color: red; font-weight: bold;">Invalid username or password</p>
        <a href="./index.html">
            <button style="padding: 10px 20px; font-size: 16px;">Go Back</button>
        </a>
    </div>
';
}

$conn->close();
?>
