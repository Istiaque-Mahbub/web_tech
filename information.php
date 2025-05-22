<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

$con = mysqli_connect("localhost", "root", "", "aqi");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_SESSION['username'];
$query = "SELECT * FROM user WHERE name = '" . mysqli_real_escape_string($con, $username) . "'";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin: 8px 0;
        }

        strong {
            width: 150px;
            display: inline-block;
        }

        button {
            padding: 6px 12px;
            font-size: 14px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Your Information</h2>
    <?php if ($result && mysqli_num_rows($result) === 1): ?>
        <?php $row = mysqli_fetch_assoc($result); ?>
        <ul>
            <li><strong>Name:</strong> <?php echo htmlspecialchars($row['name']); ?></li>
            <li><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></li>
            <li><strong>Password:</strong> <?php echo htmlspecialchars($row['password']); ?></li>
            <li><strong>Birthday:</strong> <?php echo htmlspecialchars($row['birthday']); ?></li>
            <li><strong>Country:</strong> <?php echo htmlspecialchars($row['country']); ?></li>
            <li><strong>Preferable Color:</strong> <?php echo htmlspecialchars($row['perferable_color']); ?></li>
            <li><strong>Gender:</strong> <?php echo htmlspecialchars($row['gender']); ?></li>
        </ul>
    <?php else: ?>
        <p>User information not found.</p>
    <?php endif; ?>

    <br>
    <a href="showaqi.php"><button>Cancel</button></a>
</body>
</html>

<?php mysqli_close($con); ?>
