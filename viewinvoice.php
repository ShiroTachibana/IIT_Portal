<?php
// Start session
session_start();

// Check if user is not logged in, redirect to login page if not
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Retrieve the logged-in user's username from the session
$username = $_SESSION['username'];

// Database connection parameters
$host = "localhost";
$username_db = "root";
$password_db = ""; // Assuming no password is set for the root user
$db_name = "iitportal";

// Create connection
$conn = new mysqli($host, $username_db, $password_db, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement with a parameterized query to fetch data from the 'details' table based on the logged-in user's username
$sql = "SELECT * FROM details WHERE FullName LIKE ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html>
<head>
    <title>IIT Billing</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/schoologo.webp"> 
    <link rel="stylesheet" href="main.css">
</head>
<body>
<a href="./studentdashboard.php" style="text-decoration: none; color: #333;">Return to the Dashboard</a>
    <div class="invoice-box" style="width: 750px; right: 250px;">
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
                                // Display relevant data retrieved from the database
                                while ($row = $result->fetch_assoc()) {
                                    echo $row['FullName'] . "<br>";
                                    echo $row['StudentSection'] . "<br>";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Items</td>
                <td>Balance/Amount</td>
            </tr>
            <tr class="item">
                <td>
                    <?php 
                    // Display relevant data retrieved from the database
                    $result->data_seek(0); // Reset result set pointer
                    while ($row = $result->fetch_assoc()) {
                        echo $row['Details'] . "<br>";
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    // Display relevant data retrieved from the database
                    $result->data_seek(0); // Reset result set pointer
                    while ($row = $result->fetch_assoc()) {
                        echo $row['Amount'] . "<br>";
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>

<?php
// Close prepared statement and database connection
$stmt->close();
$conn->close();
?>
