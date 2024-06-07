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

    <a href="./invoiceadmin.php">Homepage</a>
    <br>
    
</div>

</p>
  <div class="main">
  </div>
  <body>
    <div class="invoice-box" style="width: 550px;">
   <center>
        <form action="deletedetails.php" method="post">
        Delete a record by typing the student's full name (Last Name, First Name, Middle Initial)
        <div class="sbox">
        <input type="text" id="FullName" name="FullName">
        <button type="submit" value="Search">Submit Search</button>
</form><br>
<br>
</center>
        </div>
            </tr>
        </table>
    </div>
</body>
  <script src="main.js"></script>
  </html>