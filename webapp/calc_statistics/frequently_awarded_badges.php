<?php

include dirname(__FILE__) . "/config.php";
$engine = new DBConnection();
$conn = $engine->connect();

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 7. Most frequently awarded Badges
$badge_most_earned = mysqli_query($conn, "SELECT BadgeID, COUNT(*) AS FrequencyEarned FROM UserBadge GROUP BY BadgeID
ORDER BY FrequencyEarned DESC LIMIT 1");

// Close connection after use
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Most Frequently Awarded Badge</title>
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
    <h1 style="text-align: center;">Most Frequently Awarded Badge</h1>
    <table>
        <tr>
            <th>Badge ID</th>
            <th>Frequency Earned</th>
        </tr>
        <?php
        $row = mysqli_fetch_assoc($badge_most_earned);
        echo "<tr>";
        echo "<td>" . $row['BadgeID'] . "</td>";
        echo "<td>" . $row['FrequencyEarned'] . "</td>";
        echo "</tr>";
        ?>
    </table>
</body>
</html>
