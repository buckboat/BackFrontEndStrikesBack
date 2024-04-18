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

// 1. User with most Badges earned
$user_most_badges = mysqli_query($conn, "SELECT UserID, COUNT(*) AS NumberOfBadges FROM UserBadge GROUP BY UserID ORDER BY NumberOfBadges DESC LIMIT 1");

// Process the query results
if ($user_most_badges && mysqli_num_rows($user_most_badges) > 0) {
    $row = mysqli_fetch_assoc($user_most_badges);
    $user_with_most_badges = $row["UserID"];
} else {
    $user_with_most_badges = 0;
}

// Close connection after use
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard</title>
    <link href="style.css" rel="stylesheet"/>
    <style>
        .leaderboard {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .leaderboard li {
            border-bottom: 1px solid #ccc;
            padding: 10px;
        }

        .leaderboard li:first-child {
            font-weight: bold;
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

    <h2>Leaderboard - User with Most Badges</h2>

    <ul class="leaderboard">
        <?php if ($user_with_most_badges != 0): ?>
            <li>User with Most Badges: <?php echo $user_with_most_badges; ?></li>
        <?php else: ?>
            <li>No user found with badges</li>
        <?php endif; ?>
    </ul>
</div>

</body>
</html>
