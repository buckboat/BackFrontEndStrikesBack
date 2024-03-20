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


echo json_encode(array('user_with_most_badges' => $user_with_most_badges));
?>
