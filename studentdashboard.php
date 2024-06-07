<?php
// Start session
session_start();

// Check if user is not logged in, redirect to login page if not
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIT Billing</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/schoologo.webp"> 
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="aweb.css">
    <link rel="stylesheet" href="homepage.css">
</head>
<div class="hnav">
       <div style="color: #555; position: fixed; top: 15px; left: 180px;">
        <a href="login.html" style="text-decoration: none; color: #333;width: 190px;
        padding: 2px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: none;
        border-bottom: 2px solid green;">Home</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="./about school.html" style="text-decoration: none; color: #333;
        width: 190px;
         padding: 2px 20px;
         margin: 8px 0;
         box-sizing: border-box;
         border: none;
         border-bottom: 2px solid green;">About</a>
         <p style="position: absolute; right: -860px; top: -0px">
         <?php echo $_SESSION['username']; ?>
         </p>
        </div>
        </div>
 </div>
</head>
<body>
    <img src="./images/schoologo.webp" height="240px" width="250px" style="position: absolute; left: 200px; top: 90px">
    <div class="invoice-box" style="right: 100px; top: 100px; height: 150px; width: 500px;">   
        <center>Welcome!</center><br>
        <a href="viewinvoice.php">Check your balances here</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="./studentreciept.php">Check your recipt/paid dues</a><br><br>
        <a href="logout.php">Logout</a><br><br>
        <a href="./changeuserpass.php">Change name and password</a><br>
    </div>
</body>
</html>
