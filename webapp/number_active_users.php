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
        }

        .leaderboard td, .leaderboard th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .leaderboard tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .leaderboard th {
            background-color: black; /* Changed color to black */
            color: white;
        }
    </style>
</head>
<body>

<h1 style="text-align:center; color:white; ">

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

    <!-- Active Users Leaderboard -->
    <div>
        <h2>Active Users Leaderboard</h2>

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

</div>

</body>
</html>
