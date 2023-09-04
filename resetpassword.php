<?php
require 'functions/functions.php';
session_start();

// Check whether user is logged on or not
if (!isset($_SESSION['user_id'])) {
    header("location:index.php");
    exit(); // Make sure to exit after redirection
}

// Establish Database Connection
$conn = connect();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['post'])) {
    $newPassword = $_POST['password'];

    // Validate the new password here if needed

    // Hash the new password using MD5 (not recommended for security)
    $hashedPassword = md5($newPassword);

    // Update the password in the database
    $userId = $_SESSION['user_id'];
    $sql = "UPDATE users SET user_password = '$hashedPassword' WHERE user_id = $userId";

    if ($conn->query($sql) === TRUE) {
        // Password updated successfully
        echo "Password updated successfully!";
    } else {
        // Error occurred while updating the password
        echo "Error updating password: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat.it</title>
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
</head>
<body>
<div class="container">
    <?php include 'includes/navbar.php'; ?>
    <br>
    <div class="createpost">
        <form method="post" action="" onsubmit="return validatePost()" enctype="multipart/form-data">
            <h2>Reset Password</h2>
            <hr>
            <!-- Display success/error message here if needed -->
            <span style="float:right; color:black"></span>
            Password <span class="required" style="display:none;"> *You can't Leave the input Empty.</span><br>
            <textarea rows="6" name="password"></textarea>
            <div class="createpostbuttons">
                <input type="submit" value="Change Password" name="post">
            </div>
        </form>
    </div>
</div>
</body>
</html>
