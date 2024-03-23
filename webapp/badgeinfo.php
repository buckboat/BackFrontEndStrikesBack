<!DOCTYPE html>
<head>
<title>Badge Info</title>
<link href="style.css" rel="stylesheet"/>
</head>
<body>

<?php

include "..//database_operations/DBConnection.php";
$engine = new DBConnection();
$conn = $engine->connect();

    // Retrieve badge ID from URL parameter
    $badgeID = $_GET['badgeid'];

    // Query to fetch detailed badge information
    $sql = "SELECT BadgeName, BadgeIcon, BadgeDesc, BadgeCreated FROM Badge WHERE BadgeID = $badgeID";
    $result = mysqli_query($conn, $sql);

    // Display badge information
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<img src='data:image/jpeg;base64," . base64_encode($row['BadgeIcon']) . "' width='100' height='100'>";
        echo "<p><strong>Badge Name:</strong> " . $row['BadgeName'] . "</p>";
        echo "<p><strong>Badge Description:</strong> " . $row['BadgeDesc'] . "</p>";
        echo "<p><strong>Badge Created:</strong> " . $row['BadgeCreated'] . "</p>";
    } else {
        echo "Badge not found.";
    }

    ?>
</body>
</html>
