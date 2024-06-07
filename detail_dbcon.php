<?php
include("./adetails_db_conn.php");

if(isset ($_POST['FullName'])){
    $FullName = $_POST['FullName'];
    $sql = "INSERT INTO iitportal(FullName) VALUES(?)";
}
if(isset ($_POST['StudentSection'])){
    $StudentSection = $_POST['StudentSection'];
    $sql = "INSERT INTO iitportal(StudentSection) VALUES(?)";
}
if(isset ($_POST['gender'])){
    $gender = $_POST['gender'];
    $sql = "INSERT INTO iitportal(gender) VALUES(?)";
}
if(isset ($_POST['details'])){
    $Details = $_POST['details'];
    $sql = "INSERT INTO iitportal(Details) VALUES(?)";
}
if(isset ($_POST['amount'])){
    $Amount = $_POST['amount'];
    $sql = "INSERT INTO iitportal(amount) VALUES(?)";
}