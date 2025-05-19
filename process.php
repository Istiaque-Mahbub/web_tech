<?php


if (isset($_POST['submit'])) {
    if (
        $_POST['userName'] != "" || 
        $_POST['userEmail'] != '' || 
        $_POST['pass'] != '' || 
        $_POST['comPass'] != '' || 
        $_POST['birthday'] != '' || 
        $_POST['userCountry'] != '' || 
        $_POST['color'] != '' || 
        $_POST['gender'] != ''
    ) {
        echo '
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
                <button style="padding: 10px 20px; margin-right: 10px; background-color: green; color: white; border: none; border-radius: 5px;">Confirm</button>
                <button style="padding: 10px 20px; background-color: red; color: white; border: none; border-radius: 5px;">Cancel</button>
            </div>
        </div>';
    } else {
        echo "NO DATA";
    }
} else {
    echo "NO DATA";
}
?>
