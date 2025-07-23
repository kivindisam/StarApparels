<?php
if (isset($_POST["submit"])) {
    $fname= $_POST["fname"];
    $lname=$_POST["lname"];
    $email= $_POST["email"];
    $role= $_POST["role"];
    $username= $_POST["uid"];
    $pwd= $_POST["pwd"];
    $pwdRepeat=$_POST["pwdRepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    $emptyInput=emptyInputSignup($fname,$lname,$email,$username,$pwd,$pwdRepeat);
    $invalidUid=invalidUid($username);
    $invalidEmail=invalidEmail($email);
    $invalidRole=isSupervisorEmployeeOrManager($role);
    $pwdMatch=pwdmatch($pwd,$pwdRepeat);
    $uidExists=uidExists($conn,$username,$email);

    if($emptyInput !== false) {
        header("Location:../signup.php?error=emptyinput");
       exit();
    }
    if($invalidUid !== false) {
        header("Location:../signup.php?error=invalidUid ");
       exit();
    }

    if($invalidEmail !== false) {
        header("Location:../signup.php?error=invalidEmail");
       exit();
    }
   
    if($pwdMatch !== false) {
        header("Location:../signup.php?error=passwordDoesNotMatch");
       exit();
    }
    if($uidExists !== false) {
        header("Location:../signup.php?error=usernameTaken");
       exit();
    }
    if (strlen($pwd) < 8) {
        header("Location:../signup.php?error=pwdlen");
        exit();
    }
    createUser($conn,$fname,$lname,$email,$role,$username,$pwd);     
}
else{
    header("Location:../login.php");
}