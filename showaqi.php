<?php
session_start();

// Use session-stored 'perferable_color' (typo matched with DB)
$bgColor = isset($_SESSION['perferable_color']) ? $_SESSION['perferable_color'] : '#f4f6f8';

$selectedCities = [];
$error = "";

// Handle POST input
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['city']) && is_array($_POST['city'])) {
    $selectedCities = $_POST['city'];
    if (count($selectedCities) !== 10) {
        $error = "You must select exactly 10 cities. You selected " . count($selectedCities) . ".";
    }
} else {
    $error = "No cities selected.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Selected Cities AQI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: <?php echo htmlspecialchars($bgColor); ?>;
            text-align: center;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        .table-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        table {
            width: 60%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
            padding: 12px;
        }

        td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h2>AQI for Selected Cities</h2>

    <?php if ($error): ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <a href="requestAQI.php">Go back</a>
    <?php else: ?>
        <?php
        $con = mysqli_connect("localhost", "root", "", "aqi");

        if (!$con) {
            die("<p class='error'>Connection failed: " . mysqli_connect_error() . "</p>");
        }

        $escapedCities = array_map(function($city) use ($con) {
            return "'" . mysqli_real_escape_string($con, $city) . "'";
        }, $selectedCities);

        $cityList = implode(",", $escapedCities);

        $sql = "SELECT city, country, aqi FROM info WHERE city IN ($cityList)";
        $result = mysqli_query($con, $sql);

        if (!$result) {
            echo "<p class='error'>Query error: " . mysqli_error($con) . "</p>";
        } elseif (mysqli_num_rows($result) > 0) {
            echo "<div class='table-container'><table>
                    <tr>
                        <th>City</th>
                        <th>Country</th>
                        <th>AQI</th>
                    </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['city']) . "</td>
                        <td>" . htmlspecialchars($row['country']) . "</td>
                        <td>" . htmlspecialchars($row['aqi']) . "</td>
                    </tr>";
            }
            echo "</table></div>";
        } else {
            echo "<p>No data found for selected cities.</p>";
        }

        mysqli_close($con);
        ?>
    <?php endif; ?>
</body>
</html>
