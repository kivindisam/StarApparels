<?php
    session_start();
    if(isset(($_SESSION["userid"]))) {
        $EmployeeID =$_SESSION["userid"];
    }
    if (isset($_POST["submit"])) {
        $DateOfBirth = $_POST["DateOfBirth"];
        $Residence = $_POST["Residence"];
        $Salary = $_POST["Salary"];
        $BranchID = $_POST["BranchID"];
        
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';
        
        editprofile($conn, $DateOfBirth, $Residence, $Salary, $BranchID, $EmployeeID);     
    }
?>