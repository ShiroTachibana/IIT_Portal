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
    //Details
    $FullName = $mysqli->real_escape_string($_POST['FullName']);
    $StudentSection = $mysqli->real_escape_string($_POST['StudentSection']);
    $Details = $mysqli->real_escape_string($_POST['details']);
    $Amount = $mysqli->real_escape_string($_POST['amount']);

    // Check if record exists for the provided FullName
    $sql_check = "SELECT * FROM details WHERE FullName = '$FullName'";
    $result = $mysqli->query($sql_check);
    
    if ($result->num_rows > 0) {
        // Perform update query
        $sql_update = "UPDATE billing SET StudentSection = '$StudentSection', Details = '$Details', Amount = '$Amount' WHERE FullName = '$FullName'";
        if ($mysqli->query($sql_update) === TRUE) {
            echo '<script>
            alert("Details have been update sucessfully!")
            window.location.href = "invoiceadmin.php";
            </script>';
        } else {
            echo "Error: " . $sql_update . "<br>" . $mysqli->error;
        }
    } else {
        echo "No record found for the provided FullName.";
    }

    // Close connection
    $mysqli->close();
}
?>
<!-- Move this script tag to the end of the body section -->
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
