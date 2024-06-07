<?php
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
<body>
    <div class="hnav">
       <div style="color: #555; position: fixed; top: 15px; left: 180px;">
            <a href="./studentdashboard.php" style="text-decoration: none; color: #333;width: 190px;
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

    <img src="./images/schoologo.webp" height="240px" width="250px" style="position: absolute; left: 200px; top: 90px">
    
    <div class="login-box" style="right: 100px; top: 100px; height: 250px; width: 500px;">   
        <form method="post" action="./saveuserpass.php">
            Change name and password<br><br>
            Name (Last Name, First Name, Middle Initial)<br>
            <input type="text" name="changename" id="changename" placeholder="Name here" required><br>
            Password<br>
            <input type="password" name="changepass" id="changepass" placeholder="New password here" required><br><br>
            <center><button type="submit" value="Submit">Save changes</button></center>
        </form>
    </div>
</body>
</html>
