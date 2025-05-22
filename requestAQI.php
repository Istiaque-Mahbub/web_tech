<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

// DB Connection
$con = mysqli_connect("localhost", "root", "", "aqi");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user name from DB
$username = $_SESSION['username'];
$userName = "User";

$userQuery = "SELECT name FROM user WHERE name = '" . mysqli_real_escape_string($con, $username) . "'";
$userResult = mysqli_query($con, $userQuery);

if ($userResult && mysqli_num_rows($userResult) === 1) {
    $userName = mysqli_fetch_assoc($userResult)['name'];
}

// Initialize city selection
$selectedCities = [];
$error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['city']) && is_array($_POST['city'])) {
        $selectedCities = $_POST['city'];
        if (count($selectedCities) !== 10) {
            $error = "You must select exactly 10 cities. You selected " . count($selectedCities) . ".";
        }
    } else {
        $error = "You must select exactly 10 cities.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Request for AQI Values</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .top-right {
            position: absolute;
            top: 10px;
            right: 20px;
            text-align: right;
        }

        .user-info {
            margin-top: 8px;
        }

        .user-name {
            font-weight: bold;
            color: #007BFF;
            text-decoration: none;
            display: block;
            margin-bottom: 5px;
        }

        .logout-form {
            display: block;
        }

        .logout-form button {
            padding: 5px 10px;
            font-size: 14px;
            cursor: pointer;
        }

        label {
            display: inline-block;
            margin: 3px 0;
        }
    </style>
</head>
<body>
    <!-- Top Right Info -->
    <div class="top-right">
        <p style="color: red; margin: 0;">ID: 22-49167-3</p>
        <p style="color: red; margin: 0;">ID: 22-46770-1</p>
        <div class="user-info">
            <a href="information.php" class="user-name"><?php echo htmlspecialchars($userName); ?></a>
            <form method="post" action="logout.php" class="logout-form">
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>

    <h2>Select your preferable 10 cities</h2>

    <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !$error): ?>
        <h3>You selected the following cities:</h3>
        <ul>
            <?php foreach ($selectedCities as $city): ?>
                <li><?php echo htmlspecialchars($city); ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="requestAQI.php">Go back</a>
    <?php else: ?>
        <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="post" action="showaqi.php">
            <?php
            $cities = [
                "Dhaka", "Chittagong", "Rajshahi", "Delhi", "Mumbai", "Bangalore",
                "Lahore", "Karachi", "Islamabad", "Kathmandu", "Pokhara", "Biratnagar",
                "New York", "Los Angeles", "Chicago", "Toronto", "Vancouver", "Montreal",
                "Sylhet", "Hyderabad"
            ];

            foreach ($cities as $city) {
                $checked = in_array($city, $selectedCities) ? "checked" : "";
                echo "<label><input type='checkbox' name='city[]' value='$city' $checked> $city</label><br>";
            }
            ?>
            <br>
            <input type="submit" value="Submit">
        </form>
    <?php endif; ?>

<?php mysqli_close($con); ?>
</body>
</html>
