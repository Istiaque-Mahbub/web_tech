<?php
if (isset($_POST['submit'])) {
    if (
        $_POST['userName'] != "" &&
        $_POST['userEmail'] != '' &&
        $_POST['pass'] != '' &&
        $_POST['comPass'] != '' &&
        $_POST['birthday'] != '' &&
        $_POST['userCountry'] != '' &&
        $_POST['color'] != '' &&
        $_POST['gender'] != ''
    ) {
        if ($_POST['pass'] !== $_POST['comPass']) {
            echo "<p style='color:red; text-align:center;'>Passwords do not match.</p>";
            exit;
        }

        // Store form data in hidden inputs for later submission
        echo '
        <form id="confirmForm" method="post" action="">
        <input type="hidden" name="finalSubmit" value="1">
        <input type="hidden" name="userName" value="' . htmlspecialchars($_POST['userName']) . '">
        <input type="hidden" name="userEmail" value="' . htmlspecialchars($_POST['userEmail']) . '">
        <input type="hidden" name="pass" value="' . htmlspecialchars($_POST['pass']) . '">
        <input type="hidden" name="birthday" value="' . htmlspecialchars($_POST['birthday']) . '">
        <input type="hidden" name="userCountry" value="' . htmlspecialchars($_POST['userCountry']) . '">
        <input type="hidden" name="color" value="' . htmlspecialchars($_POST['color']) . '">
        <input type="hidden" name="gender" value="' . htmlspecialchars($_POST['gender']) . '">
        </form>

        <div style="display: flex; flex-direction: column; position: absolute; top: 0; right: 20px;">
            <p style="color: red;">ID: 22-49167-3</p>
            <p style="color: red; margin-top: -5px;">ID: 22-46770-1</p>
        </div>
        <div style="max-width: 400px; margin: 20px auto; padding: 20px; border: 2px solid #ccc; border-radius: 10px; font-family: Arial; background-color: #f9f9f9;">
            <h3 style="margin-top: 0;">Submitted Info</h3>
            <p><strong>Name:</strong> ' . htmlspecialchars($_POST['userName']) . '</p>
            <p><strong>Email:</strong> ' . htmlspecialchars($_POST['userEmail']) . '</p>
            <p><strong>Password:</strong> ' . htmlspecialchars($_POST['pass']) . '</p>
            <p><strong>Birthday:</strong> ' . htmlspecialchars($_POST['birthday']) . '</p>
            <p><strong>Country:</strong> ' . htmlspecialchars($_POST['userCountry']) . '</p>
            <p><strong>Preferable Color:</strong> ' . htmlspecialchars($_POST['color']) . '</p>
            <p><strong>Gender:</strong> ' . htmlspecialchars($_POST['gender']) . '</p>

            <div style="margin-top: 20px; text-align: center;">
                <button onclick="document.getElementById(\'confirmForm\').submit();" style="padding: 10px 20px; margin-right: 10px; background-color: green; color: white; border: none; border-radius: 5px;">Confirm</button>
                <button onclick="window.location.href=\'index.html\'" style="padding: 10px 20px; background-color: red; color: white; border: none; border-radius: 5px;">Cancel</button>
            </div>
        </div>';
    } else {
        echo "<p style='color:red; text-align:center;'>Please fill in all fields.</p>";
    }
} elseif (isset($_POST['finalSubmit'])) {
    // Insert data into database and redirect
    $con = mysqli_connect("localhost", "root", "", "aqi");
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $name = mysqli_real_escape_string($con, $_POST['userName']);
    $email = mysqli_real_escape_string($con, $_POST['userEmail']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    $birthday = mysqli_real_escape_string($con, $_POST['birthday']);
    $country = mysqli_real_escape_string($con, $_POST['userCountry']);
    $color = mysqli_real_escape_string($con, $_POST['color']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);

    $sql = "INSERT INTO user (name, email, password, birthday, country, perferable_color, gender)
            VALUES ('$name', '$email', '$password', '$birthday', '$country', '$color', '$gender')";

    if (mysqli_query($con, $sql)) {
        header("Location: index.html");
        exit;
    } else {
        echo "<p style='color:red; text-align:center;'>Database error: " . mysqli_error($con) . "</p>";
    }

    mysqli_close($con);
} else {
    echo "<p style='color:red; text-align:center;'>No data submitted.</p>";
}
?>
