<?php
session_start(); // Start session if not already started

// Check if user is not logged in, redirect to login page if not
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


$host = "localhost";
$username = "root";
$password = "";
$db_name = "iitportal";

// Create connection
$mysqli = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $newUsername = $_POST['changename'];
    $newPassword = $_POST['changepass'];
    $username = $_SESSION['username']; // Corrected to current username

    // Validate and sanitize input (you may add more validation as needed)
    $newUsername = htmlspecialchars(trim($newUsername));
    $newPassword = htmlspecialchars(trim($newPassword));

    // Hash the new password
    $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update user's information in the database
    $sql = "UPDATE user SET FullName = $newUsername, pass = $newPassword WHERE FullName = $username";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss", $newUsername, $hashed_password, $currentUsername);
    $stmt->execute();
    $stmt->close();

    // Update session with new username
    $_SESSION['username'] = $newUsername;

    // Redirect to a success page or display a success message
    header("Location: success.php");
    exit();
}
?>
