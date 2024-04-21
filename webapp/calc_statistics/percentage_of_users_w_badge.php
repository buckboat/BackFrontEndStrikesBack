<?php


include dirname(__FILE__) . "/config.php";
$engine = new DBConnection();
$conn = $engine->connect();

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. % of students that have earned a specific Badge
// Will probably pass the UserID from calling page
// $badge_id = data_input

$students_with_badge = mysqli_query($conn, "SELECT COUNT(*) AS EarnedFrequency FROM UserBadge WHERE BadgeID='1';"); 

// Process the query results
if ($students_with_badge && mysqli_num_rows($students_with_badge) > 0) {
    $row = mysqli_fetch_assoc($students_with_badge);
    $earned_frequency = $row["EarnedFrequency"];
} else {
    $earned_frequency = 0;
}

// Get total number of students to calculate percentage
$total_students_query = mysqli_query($conn, "SELECT COUNT(*) AS TotalStudents FROM User;");
$total_students_row = mysqli_fetch_assoc($total_students_query);
$total_students = $total_students_row['TotalStudents'];

// Calculate percentage of students with the badge
$percentage = ($earned_frequency / $total_students) * 100;

// Close connection after use
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>leftside</title>
    <link href="style.css" rel="stylesheet"/>
    <style>
        /* Additional CSS styles */
        body {
            background-color: #8e3d4f; /* Set background color */
            color: white; /* Set text color */
        }
        
        .table-container {
            margin: 0 auto;
            width: 80%;
            max-width: 600px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            font-size: x-large;
            padding: 8px;
            background-color: black;
        }

        th {
            background-color: black;
        }
    </style>
</head>
<body>

<div class="table-container">
    <h1 style="text-align: center;">Badge Percentage Chart</h1>
    <table>
        <tr>
            <th>Category</th>
            <th>Percentage</th>
        </tr>
        <tr>
            <td>Students with Badge</td>
            <td><?php echo $percentage; ?>%</td>
        </tr>
        <tr>
            <td>Students without Badge</td>
            <td><?php echo 100 - $percentage; ?>%</td>
        </tr>
    </table>
</div>

</body>
</html>

  
