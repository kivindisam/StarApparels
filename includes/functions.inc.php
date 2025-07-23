<?php
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat)
{

    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function isSupervisorEmployeeOrManager($role)
{
    $allowedRoles = ["supervisor", "employee", "manager"];

    return in_array(strtolower($role), $allowedRoles);
}


function invalidEmail($email)
{

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdmatch($pwd, $pwdRepeat)
{

    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email)
{
    $sql = "SELECT*FROM employee WHERE Emp_username =? OR Emp_email=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../signup.php?error=stmtfaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}
function createUser($conn, $fname, $lname, $email, $role, $username, $pwd)
{
    $sql = "INSERT INTO employee (FirstName,LastName,Emp_email,Emp_role,Emp_username,Emp_password) VALUES(?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../signup.php?error=stmtfaild");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $email, $role, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../login.php");
    exit();
}

function emptyInputLogin($username, $pwd)
{

    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function LoginUser($conn, $username, $pwd)
{
    $uidExists = uidExists($conn, $username, $username);
    if ($uidExists === false) {
        header("location:../signup.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists["Emp_password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header('Location:../signup,php?error=wronglogin');
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["EmployeeID"];
        $_SESSION["useruid"] = $uidExists["Emp_username"];
        $_SESSION["userfname"] = $uidExists["FirstName"];
        $_SESSION["userlname"] = $uidExists["LastName"];
        $_SESSION["role"] = $uidExists["Emp_role"];
        header("Location:../landing.php");
        exit();
    }
}
function editprofile($conn, $DateOfBirth, $Residence, $Salary, $BranchID, $EmployeeID)
{
    $sql = "UPDATE employee SET DateOfBirth = ?, Residence = ?, Salary = ?, BranchID = ? WHERE EmployeeID = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../profile.php?error=stmtfailed");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ssdii", $DateOfBirth, $Residence, $Salary, $BranchID, $EmployeeID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../profile.php");
        exit();
    }

    // $sql = "UPDATE employee SET DateOfBirth = '" . $DateOfBirth . "', Residence = '" . $Residence . "', Salary = '" . $Salary. "',BranchID = '". $BranchID . "'  WHERE  EmployeeID=" . $EmployeeID;
    // $stmt = mysqli_stmt_init($conn);
    // if (!mysqli_stmt_prepare($stmt,$sql)) {
    //  header("Location:../profile.php?error=stmtfaild");
    //  exit();
    // } else {
    //     header("Location:../profile.php");
    // }
    // mysqli_stmt_execute($stmt);
    // mysqli_stmt_close($stmt);
}
function editdependent($conn, $DependentID, $Name, $DateOfBirth, $Relationship, $EmployeeID)
{
    $sql = "INSERT INTO dependent (DependentID,Name,DateOfBirth,Relationship,EmployeeID) VALUES(?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../profile.php?error=stmtfaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssss", $DependentID, $Name, $DateOfBirth, $Relationship, $EmployeeID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../profile.php?error=non");
    exit();
}

function addOrder($conn, $OrderIdentifier, $quantity, $issuedate, $finishdate, $CustomerID, $CustomerName)
{
    $sql = "INSERT INTO ordertable (OrderIdentifier, Quantity, OrderIssueDate, OrderFinishedDate, CustomerID, CustomerName) VALUES(?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../oder.php?error=stmtfaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssss", $OrderIdentifier, $quantity, $issuedate, $finishdate, $CustomerID, $CustomerName);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../order.php");
    exit();
}
