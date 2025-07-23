<?php
session_start();
if(isset(($_SESSION["userid"]))) {
    $EmployeeID =$_SESSION["userid"];

}

if (isset($_POST["submit"])) {
    $Name=$_POST["Name"];
    $DependentID= $_POST["DependentID"];
    $DateOfBirth= $_POST["DateOfBirth"];
    $Relationship= $_POST["Relationship"];
    $EmployeeID= $_POST["EmployeeID"];
    

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    // $emptyInput=emptyInputprofile($DateOfBirth,$Residence,$Salary,$BranchID);
    // exit();
    editdependent($conn,$DependentID,$Name,$DateOfBirth,$Relationship,$EmployeeID);     
}

?>