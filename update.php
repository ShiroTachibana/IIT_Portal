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
    $sqlFullName = "SELECT FullName FROM details WHERE FullName LIKE '%$search%'";
    $sqlStudentSection = "SELECT StudentSection FROM details WHERE FullName LIKE '%$search%'";
    $sqlDetails = "SELECT Details FROM details WHERE FullName LIKE '%$search%'";
    $sqlAmount = "SELECT Amount FROM details WHERE FullName LIKE '%$search%'";

    // Execute queries
    $resultFullName = $mysqli->query($sqlFullName);
    $resultStudentSection = $mysqli->query($sqlStudentSection);

    $resultDetails = $mysqli->query($sqlDetails);
    $resultAmount = $mysqli->query($sqlAmount);
}

?>

<!DOCTYPE html>
<title>IIT Billing</title>
<link rel="shorcut icon" type="x-icon" href="./images/schoologo.webp"> 
<link rel="stylesheet" href="main.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<head>
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

</p>
  <div class="main">

  </div>
  <a href="invoiceadmin.php">Return to Dashboard</a>
  <div>
        <div class="invoice-box" style="width: 750px; right: 150px;">
        
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img
                                    src="./images/schoologo.webp"
                                    style="width: 150px; max-width: 300px">
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Intellisense Institute of Technology Inc.
                                <br />
                                A.C Cortes Ave, Mandaue<br />
                                Cebu, 6014
                            </td>

                            <td><form action="updatedetails.php" method="post">
                                <textarea name="FullName" id="FullName"><?php 
                                while ($row = $resultFullName->fetch_assoc()) {
                                    echo $row['FullName'];
                                }?></textarea><br>
                                <textarea name="StudentSection" id="StudentSection"><?php while ($row = $resultStudentSection->fetch_assoc()) {
                                    echo $row['StudentSection'];
                                }
                                ?></textarea>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Due</td>

                <td>Amount</td>
            </tr>
<div class="Textarea" id="Textarea">
            <tr class="item">
                <td style="position: absolute;">

                   <textarea id="details" name="details"rows="16" cols="20" style="font-size: 20px;" onkeydown="handleKeyPress(event)"><?php 
                    
                    while ($row = $resultDetails->fetch_assoc()) {
                        echo $row['Details'] . "<br>";
                    }?></textarea>
                    
                </td>

                <td style="position: absolute; right: 30px;">
                <textarea id="amount" name="amount" rows="16" cols="20" style="font-size: 20px;" onkeydown="handleKeyPress(event)"><?php 
                    
                    while ($row = $resultAmount->fetch_assoc()) {
                        echo $row['Amount'] . "<br>";
                    }
                    ?></textarea>
                   <br>
</td>
<button type="submit" value="Submit" style="position: absolute; bottom: 0px; left: 330px">Save Details</button>
</form>
<script src="main.js">
</script>
        
        </td>
    </div>
</div>
</div>
</body>
  </html>