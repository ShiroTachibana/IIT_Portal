<?php
session_start();
 
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') { 
    ('Location: login.php'); exit;
}

$host = "localhost";
$username = "root";
$password = ""; 
$db_name = "iitportal";


$mysqli = new mysqli($host, $username, $password, $db_name);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


$male_query = "SELECT FullName FROM details  WHERE Gender = 'Male' AND StudentSection = '12 - Trust-Team'" ;
$male_result = $mysqli->query($male_query);


$female_query = "SELECT FullName FROM details WHERE Gender = 'Female' AND StudentSection = '12 - Trust-Team'";
$female_result = $mysqli->query($female_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIT Billing</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<div class="sidenav">
    <button type="button" class="collapsible">Grade 11</button>
    <div class="content">
        <p>
        <a href="./Integrity.php">Integrity</a>
            <a href="./Innovative.php">Innovative</a>
            <a href="./Inventive.php">Inventive</a>
            <a href="./Industrious.php">Industrious</a>
        </p>
    </div>
    <br>
    <button type="button" class="collapsible">Grade 12</button>
    <div class="content">
        <p>
            <a href="Trustworthy.php">Trustworthy</a>
            <a href="Trust-team.php">Trust-team</a>
        </p>
    </div>
    <br>
    <a href="./invoiceadmin.php">Homepage</a>
    <br>
</div>

<div class="main">
    <div class="invoice-box" style="width: 750px; right: 150px;">
        <center>
            <h1 style="font-family: Verdana; font-size: 15px">Trust-Team<br>Recorded Students</h1>
        </center>
        <div>
        <div style="position: absolute; left: 10px; top: 100px;">
            <h2>Male</h2>
            <ul>
                <?php
                if ($male_result->num_rows > 0) {
                    while ($row = $male_result->fetch_assoc()) {
                        echo "<li>" . $row['FullName'] . "</li>";
                    }
                } else {
                    echo "No male students found";
                }
                ?>
            </ul>
    
        </div>
        <div>
          <div style="position: absolute; right: 10px; top: 100px;">
            <h2>Female</h2>
            <ul>
                <?php
                if ($female_result->num_rows > 0) {
                    while ($row = $female_result->fetch_assoc()) {
                        echo "<li>" . $row['FullName'] . "</li>";
                    }
                } else {
                    echo "No female students found";
                }
                ?>
            </ul>
            </div>
        </div>
    </div>
</div>

<script src="main.js"></script>
</body>
</html>
