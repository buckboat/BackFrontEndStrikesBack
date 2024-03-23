<!DOCTYPE html>
<head>
<title>View Badges</title>
<link href="style.css" rel="stylesheet"/>
</head>
<body>

<?php

include "..//database_operations/DBConnection.php";
$engine = new DBConnection();
$conn = $engine->connect();

    // Query to fetch badge information
    $sql = "SELECT BadgeID, BadgeName, BadgeIcon FROM Badge WHERE BadgeApproved = 1";
    $result = mysqli_query($conn, $sql);

    // Display badge information
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>";
            echo "<img src='data:image/jpeg;base64," . base64_encode($row['BadgeIcon']) . "' width='50' height='50'>";
            echo "<p>" . $row['BadgeName'] . "</p>";
            echo "<a href='badgeinfo.php?badgeid=" . $row['BadgeID'] . "'>More Info</a>";
            echo "</div>";
        }
    } else {
        echo "No badges found.";
    }

    ?>
</body>
</html>