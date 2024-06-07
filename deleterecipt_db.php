<?php
session_start();
 
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') { 
  header('Location: login.php'); exit;
}

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
    // Details
    $FullName = $mysqli->real_escape_string($_POST['FullName']);

    // Perform delete query
    $sql_delete = "DELETE FROM billing WHERE FullName = '$FullName'";
    if ($mysqli->query($sql_delete) === TRUE) {
        echo '<script>
        alert("Details deleted sucessfully!");
        window.location.href = "invoiceadmin.php";
        </script>';
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }

    // Close connection
    $mysqli->close();
}
?>
<!-- Move this script tag to the end of the body section -->
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>