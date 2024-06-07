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

?>
<!DOCTYPE html>
<title>IIT Billing</title>
<link rel="shorcut icon" type="x-icon" href="./images/schoologo.webp"> 
<link rel="stylesheet" href="main.css">
<div class="sidenav">
    
      
    <button type="button" class="collapsible">Grade 11</button>
<div class="content">
  <p><a style="border: solid;
    border-width: 1px;" href="">Integrity</a>
<a style="border: solid;
border-width: 1px;" href="">Innovative</a>
<a style="border: solid;
border-width: 1px;" href="">Inventive</a>
<a style="border: solid;
border-width: 1px;" href="">Industrious</a>
  </div>
<br>
<br>
<button type="button" class="collapsible">Grade 12</button>
<div class="content">
    <p>
    <a style="border: solid;
    border-width: 1px;" href="Trustworthy.php">Trustworthy</a>
    <a style="border: solid;
    border-width: 1px;" href="Trust-team.html">Trust-team</a>
    </p>
    </div>
    <br>

    <a href="./index.html">Homepage</a>
    <br>
    <a href="./about school.html"> School</a>
    <br>
    
</div>

</p>
  <div class="main">
    ...
  </div>
  <body>
    <div class="invoice-box">
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
                            <td>
                                <?php
                                $sql = "SELECT FullName FROM details WHERE FullName LIKE '%".$search."%'";
                                $sql = "SELECT StudentSection FROM details WHERE FullName LIKE '%".$search."%'";
                                $sql = "SELECT ID_NUMBER FROM details WHERE FullName LIKE '%".$search."%'";
                                ?>
                            </td>
                            <tr class="heading">
                <td>Items</td>

                <td>Balance/Amount</td>
            </tr>

            <tr class="item">
               <td><?php 
                $sql = "SELECT Details FROM details WHERE FullName LIKE '%$search%'";
                ?> </td>

                <td>
                    <?php 
                    $sql = "SELECT Amount FROM details WHERE FullName LIKE '%$search%";
                    ?>
                </td>
            </tr>

        </div>
            </tr>
        </table>
    </div>
</body>
  <script src="main.js"></script>
  </html>