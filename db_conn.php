<?php

$host = "localhost";
$fname = "root";
$username = "root";
$password = "";
$idnum = "root";
$db_name = "iitportal";


$mysqli = new mysqli("localhost", "root", "user");
if ($mysqli -> connect_errno)
{
 echo "Failed to connect MySQL: " . $mysqli -> connect_error ;
 exit();
}
if ($con)
{
    $sql = "INSERT INTO 'user' (FullName, Username, Password, ID_NUMBER)
    values('$fname', '$username', '$password', '$idnum')";
    $result = mysqli_query($con, $sql);
    if ($result)
    {
        echo "Registered Sucessfully!";
    } else {
    die("Error". mysqli_error($con));
    }
}

$fname = $_POST['fname'];
$username = $_POST['username'];
$password = $_POST['password'];
$idnum = $_POST['idnum'];
?>