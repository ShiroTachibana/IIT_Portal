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

// Assuming a form is submitted with a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input to prevent SQL injection
    $search = $mysqli->real_escape_string($_POST['search']);

    // Execute SQL queries to retrieve data based on user input
    $sqlFullName = "SELECT FullName FROM billing WHERE FullName LIKE '%$search%'";
    $sqlStudentSection = "SELECT StudentSection FROM billing WHERE FullName LIKE '%$search%'";
    $sqlDetails = "SELECT Details FROM billing WHERE FullName LIKE '%$search%'";
    $sqlAmount = "SELECT Amount FROM billing WHERE FullName LIKE '%$search%'";

    // Execute queries
    $resultFullName = $mysqli->query($sqlFullName);
    $resultStudentSection = $mysqli->query($sqlStudentSection);

    $resultDetails = $mysqli->query($sqlDetails);
    $resultAmount = $mysqli->query($sqlAmount);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>IIT Billing</title>
    <link rel="shorcut icon" type="x-icon" href="./images/schoologo.webp"> 
    <link rel="stylesheet" href="main.css">
</head>
<div class="sidenav">
    <button type="button" class="collapsible">Grade 11</button>
    <div class="content">
        <p>
            <a href="./Integrity.php">Integrity</a>
            <a href="./Innvovative.php">Innovative</a>
            <a href="./Inventive.php">Inventive</a>
            <a href="./Industrious.php">Industrious</a>
        </p>
    </div>
    <br>
    <button type="button" class="collapsible">Grade 12</button>
    <div class="content">
        <p>
            <a href="./Trustworthy.php">Trustworthy</a>
            <a href="./Trust-team.php">Trust-team</a>
        </p>
    </div>
    <br>
    <a href="./invoiceadmin.php">Homepage</a>
    <br>
</div>
 
    <div class="invoice-box" style="width: 750px; right: 160px;">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="./images/schoologo.webp" style="width: 150px; max-width: 300px">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Intellisense Institute of Technology Inc.<br />
                                A.C Cortes Ave, Mandaue<br />
                                Cebu, 6014
                            </td>
                            <td>
                                <?php 
                                
                                while ($row = $resultFullName->fetch_assoc()) {
                                    echo $row['FullName'] . "<br>";
                                }
                                while ($row = $resultStudentSection->fetch_assoc()) {
                                    echo $row['StudentSection'] . "<br>";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Due</td>
                <td>Amount</td>
            </tr>
            <div class="displayContent" id="displayContent">
            <tr class="item">
                <td>
                    <?php 
                    // Display relevant data retrieved from the database
                    while ($row = $resultDetails->fetch_assoc()) {
                        echo $row['Details'] . "<br>";
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    // Display relevant data retrieved from the database
                    while ($row = $resultAmount->fetch_assoc()) {
                        echo $row['Amount'] . "<br>";
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
    </form>
    <script>
        // Function to convert specific part of the page to PNG image
        function convertToPNG() {
            // Get the element to print
            var contentToPrint = document.getElementById('content-to-print');

            // Create a new canvas element
            var canvas = document.createElement('canvas');
            canvas.width = contentToPrint.offsetWidth;
            canvas.height = contentToPrint.offsetHeight;
            var context = canvas.getContext('2d');

            // Draw the content of the element onto the canvas
            context.drawWindow(window, contentToPrint.offsetLeft, contentToPrint.offsetTop, contentToPrint.offsetWidth, contentToPrint.offsetHeight, 'rgb(255,255,255)');

            // Convert canvas to PNG image data
            var imageData = canvas.toDataURL('image/png');

            // Open the PNG image in a new tab
            var newWindow = window.open(imageData, '_blank');
        }

        // Event listener for the print button
        document.getElementById('print-button').addEventListener('click', function() {
            convertToPNG();
        });
    </script>
    </script>
</body>
</html>
