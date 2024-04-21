<?php


include dirname(__FILE__) . "/config.php";
$engine = new DBConnection();
$conn = $engine->connect();


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 5. Number of Badges earned per Department
$department_badges_earned = mysqli_query($conn, "SELECT DepartmentID, COUNT(*) AS NumberOfBadges FROM UserDepartment  JOIN UserBadge ON UserDepartment.UserID = UserBadge.UserID GROUP BY DepartmentID");

// Close connection after use
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Badges Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            font-size: larger;
            color:purple;
        }
        th {
            background-color: #000;
            text-align: center;
            
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #ddd;
        }
        tr:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Department Badges Report</h1>
    <table>
        <tr>
            <th>Department ID</th>
            <th>Number of Badges</th>
        </tr>
        <?php
        // Assuming $department_badges_earned is the result of your SQL query
        while ($row = mysqli_fetch_assoc($department_badges_earned)) {
            echo "<tr>";
            echo "<td>" . $row['DepartmentID'] . "</td>";
            echo "<td>" . $row['NumberOfBadges'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
