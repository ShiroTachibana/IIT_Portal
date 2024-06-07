<?php
$host = "localhost";
$username = "root";
$password = ""; // Assuming no password is set for the root user
$db_name = "iitportal";

// Create connection
$mysqli = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $fname = $mysqli->real_escape_string($_POST['fname']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $idnum = $mysqli->real_escape_string($_POST['idnum']);
    
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Perform insert query
    $sql = "INSERT INTO user (FullName, pass, URole, ID_NUMBER) VALUES ('$fname', '$hashed_password', 'student', '$idnum')";
    if ($mysqli->query($sql) === TRUE) {
        echo '<script>
        alert("Account has been created successfully");
        window.location.href = "login.php";
        </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

// Close connection
$mysqli->close();
?>
<!-- Move this script tag to the end of the body section -->
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
