<?php
// Server credentials
$servername = "localhost";
$username = "test";
$password = "test";
$dbname = "test";

// Create server/database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. % of students that have earned a specific Badge
// Will probably pass the UserID from calling page
// $badge_id = data_input

$students_with_badge = mysqli_query($conn, "SELECT COUNT(*) AS EarnedFrequency FROM UserBadge WHERE BadgeID='3'"); 

// Process the query results
if ($students_with_badge && mysqli_num_rows($students_with_badge) > 0) {
    $row = mysqli_fetch_assoc($students_with_badge);
    $earned_frequency = $row["EarnedFrequency"];
} else {
    $earned_frequency = 0;
}

// Get total number of students to calculate percentage
$total_students_query = mysqli_query($conn, "SELECT COUNT(*) AS TotalStudents FROM Students");
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
        max-width: 600px
      }
    </style>
</head>
<body>

<h1 style="text-align:center; color:white; "   >

    <img src="spirit-logo-purple-rgb.png" alt="" width="64" height="64">

    Lumberjack Rewards

</h1>

<div class="main">
    <div class="leftside">
        <!-- Your leftside navigation code goes here -->
        <form style="padding-bottom:5px;" method="post">
            <input type="submit" name="mems" value="Members" />
        </form>
        <form style="padding-bottom:5px;" method="post">
            <input type="submit" name="badges" value="Badges" />
        </form>
        <form style="padding-bottom:5px;" method="post">
            <input type="submit" name="requests" value="Requests" />
        </form>
        <form style="padding-bottom:5px;" method="post">
            <input type="submit" name="Stats" value="Statistics" />
        </form>
        <form style="padding-bottom:5px;" method="post">
            <input type="submit" name="events" value="Events" />
        </form>

        <a href="https://bit.ly/3BlS71b"><img src="Donate.jpg" style="display:flex; vertical-align:middle; color:red; " width="100%" height="44"></a>

        <form style=" padding-top:266%; bottom: 20px;" method="post">
            <input type="submit" name="Logout" value="Logout" />
        </form>
    </div>
</div>

<head>
    <title>Badge Percentage Chart</title>
    <style>
        /* Additional CSS styles */
        body {
            background-color: #8e3d4f; /* Set background color */
            color: white; /* Set text color */
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            background-color: black
        }
        
        th {
            background-color: black;
        }
    </style>
</head>
<body>

<div class ="table-container">
  <h2>Badge Percentage Chart</h2>
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
  </body>
  
</html>
  
