<!DOCTYPE html>
<head>
    <title>Edit Badges</title>
    <link href="style.css" rel="stylesheet"/>

    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>

</head>
<body>

<?php
include "..//database_operations/DBConnection.php";
$engine = new DBConnection();
$conn = $engine->connect();

if(isset($_POST['edit'])) {
    $requests = $_POST['edit'];

    foreach($requests as $request) {
        $badge_id = $request['badge_id'];
        $badge_name = $request['badge_name'];
        $badge_desc = $request['badge_desc'];
        $badge_criteria = $request['badge_criteria'];

        // Create a request to update the badge
        $sql = "INSERT INTO BadgeRequest (BadgeID, BadgeName, BadgeDesc, BadgeCriteria, Comment) 
                VALUES ('$badge_id', '$badge_name', '$badge_desc', '$badge_criteria', 'Requested changes')";

        if(mysqli_query($conn, $sql)) {
            echo "Request submitted successfully for BadgeID: $badge_id.<br>";
        } else {
            echo "Error submitting request for BadgeID: $badge_id - " . mysqli_error($conn) . "<br>";
        }
    }

    // Redirect to index.php page after submitting the requests
    header("Location: index.php");
    exit(); 
}

// Fetch all badges from the database
$sql = "SELECT * FROM Badge";
$result = mysqli_query($conn, $sql);
?>

<!-- Form to edit badges -->
<form method="post" action="">
    <table>
        <tr>
            <th>Badge Name</th>
            <th>Badge Description</th>
            <th>Badge Criteria</th>
            <th>Action</th>
        </tr>
        <?php
        // Loop through each badge and display its information
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<input type='hidden' name='edit[" . $row['BadgeID'] . "][badge_id]' value='" . $row['BadgeID'] . "'>";
            echo "<td><input type='text' name='edit[" . $row['BadgeID'] . "][badge_name]' value='" . $row['BadgeName'] . "' required></td>";
            echo "<td><input type='text' name='edit[" . $row['BadgeID'] . "][badge_desc]' value='" . $row['BadgeDesc'] . "' required></td>";
            echo "<td><input type='text' name='edit[" . $row['BadgeID'] . "][badge_criteria]' value='" . $row['BadgeCriteria'] . "' required></td>";
            echo "</tr>";
        }
        ?>
        <!-- Add badge button -->
        <tr>
            <td><button type='submit' name='add'>Add Badge</button></td>
        </tr>
    </table>
</form>
</body>
</html>