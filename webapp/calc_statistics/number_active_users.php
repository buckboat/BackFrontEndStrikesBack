<?php

include dirname(__FILE__) . "/config.php";
$engine = new DBConnection();
$conn = $engine->connect();

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 4. Number of Active Users per duration of Time
	// ASSUMPTION: The data being passed in will be of datetime datatype
	// $start_date
	$users_per_time = mysqli_query($conn, "SELECT * FROM User WHERE LastLogin>='2024-02-13 19:48:59'"); // Change datetime -> LastLogin >= $start_date

// Close connection after use
mysqli_close($conn);
?>



<!DOCTYPE html>
<html>
<head>
    <title>Lumberjack Rewards</title>
    <link href="style.css" rel="stylesheet"/>
    <style>
        .leaderboard {
            border-collapse: collapse;
            width: 100%;
            color: white;
            text-align: center;
            font-size: x-large;
        }

        .leaderboard td, .leaderboard th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .leaderboard tr:nth-child(even) {
            background-color: #f2f2f2;
            color: purple;
        }

        .leaderboard th {
            background-color: black; /* Changed color to black */
            color: white;
        }
    </style>
</head>
<body>

    <!-- Active Users Leaderboard -->
    <div>
        <h1 style="text-align: center;">Active Users Leaderboard</h1>

        <table class="leaderboard">
            <tr>
                <th>Rank</th>
                <th>User ID</th>
                <th>Username</th>
                <th>Last Login</th>
            </tr>
            <?php
            $rank = 1;
            while ($row = mysqli_fetch_assoc($users_per_time)) {
                echo "<tr>";
                echo "<td>" . $rank++ . "</td>";
                echo "<td>" . $row['UserID'] . "</td>";
                echo "<td>" . $row['Username'] . "</td>";
                echo "<td>" . $row['LastLogin'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>
