<?php


include dirname(__FILE__) . "/config.php";
$engine = new DBConnection();
$conn = $engine->connect();

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
            text-align: center;
            font-size: x-large;
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

    <h1 style="text-align: center;">Leaderboard - User with Most Badges</h1>

    <ul class="leaderboard">
        <?php if ($user_with_most_badges != 0): ?>
            <li>User  <?php echo $user_with_most_badges; ?></li>
        <?php else: ?>
            <li>No user found with badges</li>
        <?php endif; ?>
    </ul>

</body>
</html>
