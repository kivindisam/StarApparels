<?php
include_once "header.php";
$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "starapparels";
$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);
if (!$conn) {
    die("connection failed:" . mysqli_connect_error());
}
if (isset(($_SESSION["userid"]))) {
    $mm = $_SESSION["userid"];
    $dbinfo = "SELECT * FROM employee WHERE EmployeeID='$mm'";
    $dbresult = mysqli_query($conn, $dbinfo);
    $rt = mysqli_fetch_array($dbresult);
    $empId = $rt['EmployeeID'];
    $fname = $rt['FirstName'];
    $lname = $rt['LastName'];
    $empEmail = $rt['Emp_email'];
    $empUnam = $rt['Emp_username'];
    $empDOB = $rt['DateOfBirth'];
    $empResidence = $rt['Residence'];
    $empSalary = $rt['Salary'];
    $empBranchID = $rt['BranchID'];

    $branches_query = "SELECT * FROM branch";
    $branches = mysqli_query($conn, $branches_query);

    // Dependents data
    $dependent_query = "SELECT * FROM dependent WHERE EmployeeID='$empId'";
    $dependents = mysqli_query($conn, $dependent_query);
    $dependent_count = mysqli_num_rows($dependents);
}
include_once "footer.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>profile</title>
    <link rel="stylesheet" herf="style.css">
    <style>
         .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            
        }
        /*h1 {
            text-align: center;
            font-size: 30px;
            width:100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            
        }*/
        h3{
          text-align: left;
          font-size: 22px;
          width:100%;
          padding: 12px 8px;
          display: inline-block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    
    </style>
</head>

<body>
    <div class="container">
        <h1> Star Apparels </h1>
        <h2> Employee profile</h2>
        <table>
            <tr>
                <td><strong>Employee ID</strong></td>
                <td><?php echo $empId; ?></td>
            </tr>
            <tr>
                <td><strong>Employee Name</strong></td>
                <td><?php echo $fname . ' ' . $lname; ?></td>
            </tr>
            <tr>
                <td><strong>Employee Email</strong></td>
                <td><?php echo $empEmail; ?></td>
            </tr>
            <tr>
                <td><strong>Employee Username</strong></td>
                <td><?php echo $empUnam; ?></span></td>
            </tr>
        </table>
        <div class="form">
            <form action="includes/profile.inc.php" method="post">
                <input type="text" id="DateOfBirth" name="DateOfBirth" value="<?php echo $empDOB; ?>" placeholder="DateOfBirth" required>
                <input type="text" id="Residence" name="Residence" value="<?php echo $empResidence; ?>" placeholder="Residence" required>
                <input type="text" id="Salary" name="Salary" value="<?php echo $empSalary; ?>" placeholder="Salary" required>
                <select name="BranchID" id="BranchID" required>
                    <option hidden value="">Select the Branch</option>
                    <?php foreach ($branches as $key => $branch) :?>
                    <option value="<?php echo $branch['BranchID']; ?>" <?php echo ($branch['BranchID'] == $empBranchID) ? 'selected' : ''; ?>><?php echo $branch['BranchName']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button name="submit" type="submit">Update</button>
            </form>
            <div class="dependent">
                <h3> Dependant Details</h3>
                <table>
                    <header>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Relationship</th>
                        </tr>
                    </header>
                    <body>
                    <?php foreach ($dependents as $key => $dependent) :?>
                        <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $dependent['Name']; ?></td>
                            <td><?php echo $dependent['DateOfBirth']; ?></td>
                            <td><?php echo $dependent['Relationship']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if($dependent_count < 1): ?>
                        <tr>
                            <td class="text-center" colspan="4">No data available</td>
                        </tr>
                    <?php endif; ?>
                    </body>
                </table>
                <?php if($dependent_count < 3): ?>
                <form action="includes/dependent.inc.php" method="post">
                    <input type="hidden" id="EmployeeID" name="EmployeeID" value="<?php echo $empId ?> " placeholder="Name" required>
                    <input type="text" id="Name" name="Name" placeholder="Dependent Name" required>
                    <input type="text" id="DateOfBirth" name="DateOfBirth" placeholder="Dependent Date Of Birth" required>
                    <input type="text" id="Relationship" name="Relationship" placeholder="Relationship of the Dependent" required>
                    <button name="submit" type="submit">Add</button>
                </form>
                <?php endif; ?>
            </div>
        </div>
</body>

</html









