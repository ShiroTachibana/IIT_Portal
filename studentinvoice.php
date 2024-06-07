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

                            <td><form action="detail_dbcon.php" method="post">
                                <input type="text" name="FullName" id="FullName" placeholder="Student full name..."> <br />
                                <input type="text" name="StudentSection" id="StudentSection" placeholder="Student grade and section.."><br>
                                <input type="text" name="gender" id="gender" placeholder="Student gender"><br>
                                <p style="font-size: 10px">The gender will not show on the invoice <br>this is for the list of recorded students<br>
                            </p></tr>
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

                   <textarea id="details" name="details"rows="16" cols="20" style="font-size: 20px;" onkeydown="handleKeyPress(event)"></textarea>
                    
                </td>

                <td style="position: absolute; right: 30px;">
                <textarea id="amount" name="amount" rows="16" cols="20" style="font-size: 20px;" onkeydown="handleKeyPress(event)"></textarea>
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