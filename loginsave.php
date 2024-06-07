<?php
// Start session
session_start();

$host = "localhost";
$username = "root";
$password = ""; // Assuming no password is set for the root user
$db_name = "iitportal";

// Create connection
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['Username'];
$password = $_POST['Password'];

// Sanitize user input to prevent SQL injection
$username = $conn->real_escape_string($username);

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Query to check if the provided username exists in the database
$sql = "SELECT * FROM user WHERE FullName = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, verify password
    $row = $result->fetch_assoc();
    $stored_password = $row['pass'];
    
    if (password_verify($password, $stored_password)) {
        // Password is correct, login successful
        $role = $row['URole']; // Assuming 'role' is a column in your user table indicating the user's role

        // Set session variable to indicate user is logged in
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        // Redirect based on role
        if ($role == 'admin') {
            echo '<script>
            alert("Login successful! You will be redirected to the admin dashboard after clicking the OK button");
            window.location.href = "invoiceadmin.php";
            </script>';
            
        } elseif ($role == 'student') {
            echo '<script>
            alert("Login successful! You will be redirected to the students dashboard after clicking the OK button");
            window.location.href = "studentdashboard.php";
            </script>';
            
        } else {
            // Invalid role, redirect to login page
            header("Location: login.php");
        }
        exit(); // Terminate script execution after redirection
    } else {
        // Incorrect password
        echo '<script>
            alert("Invalid username or password! Please enter the correct details");
            window.location.href = "login.php";
          </script>';
    }
} else {
    // No user found
    echo '<script>
            alert("Invalid username or password! Please enter the correct details");
            window.location.href = "login.php";
          </script>';
}

$conn->close();
?>
