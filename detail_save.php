<?php

include("./adetails_db_conn.php");
//Student Details
if(isset ($_POST['FullName'])){
    $FullName = $_POST['FullName'];
    $sql = "INSERT INTO iitportal(details) VALUES(?)";
}
if(isset ($_POST['StudentSection'])){
    $StudentSection = $_POST['StudentSection'];
    $sql = "INSERT INTO iitportal(details) VALUES(?)";
}
if(isset ($_POST["Details"])){
    $Details = $_POST["Details"];
    $sql = "INSERT INTO iitportal(details) VALUES(?)";
}
if(isset ($_POST["Amount"])){
    $Amount = $_POST["Amount"];
    $sql = "INSERT INTO iitportal(details) VALUES(?)";
}