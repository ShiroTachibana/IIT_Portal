<?php
session_start();
 
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') { 
    header('Location: login.php'); exit;
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
    border-width: 1px;" href="./Integrity.php">Integrity</a>
<a style="border: solid;
border-width: 1px;" href="./Innovative.php">Innovative</a>
<a style="border: solid;
border-width: 1px;" href="./Inventive.php">Inventive</a>
<a style="border: solid;
border-width: 1px;" href="./Industrious.php">Industrious</a>
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
    <a href="./logout.php">Logout</a>
    
</div>

</p>
  <div class="main">
  </div>
  <body>
    <div class="invoice-box" style="width: 550px; height: 520px;">
   <center>
   Payment Due<br>
        <form action="invoice.php" method="post">
        Search Student's Name or ID 
        <div class="sbox">
        <input type="text" id="search" name="search">
        <button type="submit" value="Search">Submit Search</button>
</form><br>
<br>
<a href="./studentinvoice.php" style="font-size: 20px;">Create a payment due</a><br><br>
<a href="./updatesearch.php" style="font-size: 20px;">Update a payment due</a><br><Br>
<a href="./delete.php" style="font-size: 20px;">Delete a payment due</a><br><br>
<Br><Br>Invoice / Recipt<br>
<form action="recipt.php" method="post">
        Search Student's Name or ID 
        <div class="sbox">
        <input type="text" id="search" name="search">
        <button type="submit" value="Search">Submit Search</button><br><Br>
<a href="./reciptadd.php" style="font-size: 20px;">Create an invoice or recipt</a><br><br>
<a href="./reciptbefupdate.php" style="font-size: 20px;">Update an invoice or recipt</a><br><br>
<a href="./deleterecipt.php" style="font-size: 20px;">Delete an invoice or recipt</a><br><br>
</center>
        </div>
            </tr>
        </table>
    </div>
</body>
  <script src="main.js"></script>
  </html>