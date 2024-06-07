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
   
   
    // Perform insert query
    $sql = "INSERT INTO billing (FullName, StudentSection, Details, Amount) VALUES ('$FullName', '$StudentSection', '$Details', '$Amount')";
    if ($mysqli->query($sql) === TRUE) {

       echo '
       <script>
       alert("Details recorded successfully!");
       window.location.href = "invoiceadmin.php";
       </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    // Close connection
    $mysqli->close();
}
?>
<!-- Move this script tag to the end of the body section -->
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>