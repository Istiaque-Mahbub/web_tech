<?php
$selectedCities = [];
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['city']) && is_array($_POST['city'])) {
        $selectedCities = $_POST['city'];
        $count = count($selectedCities);
        if ($count !== 10) {
            $error = "You must select exactly 10 cities. You selected $count.";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request for AQI Values</title>
</head>
<body>
    <div style="display: flex; flex-direction: column; position: absolute; top: 0; right: 20px;">
        <p style="color: red;">ID: 22-49167-3</p>
        <p style="color: red; margin-top: -5px;">ID: 22-46770-1</p>
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
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="post" action="">
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
            <br><br>
            <input type="submit" value="Submit">
        </form>
    <?php endif; ?>
</body>
</html>
 