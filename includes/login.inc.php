<?php
if (isset($_POST["submit"])) {
   // if(isset($_POST["uid"] )&& isset($_POST["pwd"])){

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
 
    if(emptyInputLogin($username,$pwd)!==false){
        header("Location:../login.php?error=emptyinput");
       exit();
    }

    LoginUser($conn,$username,$pwd);
//}else {
    //echo "Invalid data Submitted";
//}

}else{
    header("Location:../login.php");
    exit();
}
