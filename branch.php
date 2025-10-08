<?php
  include_once "header.php";
?>
<style>
    .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            
        }
       
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

        .button-container a.button:hover {
            background-color: #555;
        }
</style>

    <div class="container">
        <h1>Star Apparels</h1>
        <h2> Branches</h2>
        <table>
            <thead>
                <tr>
                    <th>Branch ID</th>
                    <th>Branch Name</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <!-- Fetch and display branch data from the database -->
                <?php

                $host = 'localhost'; 
                $dbname = 'starapparels'; 
                $username = 'root'; 
                $password = ''; 
                
                try {
                    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $stmt = $pdo->query("SELECT * FROM branch");
                    
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>{$row['BranchID']}</td>";
                        echo "<td>{$row['BranchName']}</td>";
                        echo "<td>{$row['PhoneNumber']}</td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </tbody>
        </table>
    
<?php
  include_once "footer.php";
?>
