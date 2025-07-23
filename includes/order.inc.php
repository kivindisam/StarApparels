<?php
session_start();
if(isset(($_SESSION["userid"]))) {
    $EmployeeID =$_SESSION["userid"];
}

if (isset($_POST["submit"])) {
    $OrderIdentifier = $_POST["OrderIdentifier"];
    $quantity = $_POST["quantity"];
    $issuedate = $_POST["issuedate"];
    $finishdate = $_POST["finishdate"];
    $CustomerID = $_POST["CustomerID"];

    require_once 'dbh.inc.php';

    $query = "SELECT * FROM customer WHERE CustomerID = '$CustomerID'";
    $result = mysqli_query($conn, $query);
    $customer = mysqli_fetch_array($result);
    require_once 'functions.inc.php';
    addOrder($conn, $OrderIdentifier, $quantity, $issuedate, $finishdate, $customer['CustomerID'], $customer['CustomerName']);
}
