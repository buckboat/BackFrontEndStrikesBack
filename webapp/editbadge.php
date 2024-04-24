<!DOCTYPE html>
<html>

<head>
    <title>Edit Badges</title>
    <link href="style.css" rel="stylesheet" />

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

    if (isset($_POST['edit'])) {
        $badges = $_POST['edit'];

        foreach ($badges as $badge_id => $badge) {
            $badge_name = $badge['badge_name'];
            $badge_desc = $badge['badge_desc'];
            $badge_criteria = $badge['badge_criteria'];
            $badge_comment = $badge['badge_comment'];
            $badge_rarity = $badge['badge_rarity'];
            $badge_steps = $badge['badge_steps'];

            // Check if there are any mf changes from saved changes to what is in the database
            $sql_check_changes = "SELECT * FROM Badge WHERE BadgeID = '$badge_id'";
            $result_check_changes = mysqli_query($conn, $sql_check_changes);
            $row_check_changes = mysqli_fetch_assoc($result_check_changes);
        //|| $row_check_changes['BadgeComment'] != $badge_comment
            if ($row_check_changes['BadgeName'] != $badge_name || $row_check_changes['BadgeDesc'] != $badge_desc || $row_check_changes['BadgeCriteria'] != $badge_criteria  || $row_check_changes['BadgeRarity'] != $badge_rarity || $row_check_changes['BadgeSteps'] != $badge_steps) {
                // Check if a mf request with the same badgeID exists


                $sql_check_request = "SELECT * FROM BadgeRequest WHERE BadgeID = '$badge_id'";
                $result_check_request = mysqli_query($conn, $sql_check_request);
            
                if (mysqli_num_rows($result_check_request) > 0) {
                    // Update the mf request table
                    $sql_update_request = "UPDATE BadgeRequest SET BadgeName = '$badge_name', BadgeDesc = '$badge_desc', BadgeCriteria = '$badge_criteria', Comment = '$badge_comment', BadgeRarity = '$badge_rarity', BadgeSteps = '$badge_steps' WHERE BadgeID = '$badge_id'";
                    if (mysqli_query($conn, $sql_update_request)) {
                        echo "Request updated successfully for BadgeID: $badge_id.<br>";
                    } else {
                        echo "Error updating request for BadgeID: $badge_id - " . mysqli_error($conn) . "<br>";
                    }
                } else {
                    // Insert into the mf request table
                    $sql_insert_request = "INSERT INTO BadgeRequest (UserID, BadgeID, BadgeName, BadgeDesc, BadgeCriteria, BadgeIcon, BadgeRarity, BadgeSteps, Comment, isVisible) VALUES ('{$_SESSION['UserID']}', '$badge_id', '$badge_name', '$badge_desc', '$badge_criteria', 1, 1, 1, '$badge_comment', 1)";
                    if (mysqli_query($conn, $sql_insert_request)) {
                        echo "New request added successfully for BadgeID: $badge_id.<br>";
                    } else {
                        echo "Error adding request for BadgeID: $badge_id - " . mysqli_error($conn) . "<br>";
                    }
                }
            } else {
                echo "No changes detected for BadgeID: $badge_id. Skipping...<br>";
            }
        }
    }

    // Fetch all badges from the database
    $sql = "SELECT * FROM Badge";
    $result = mysqli_query($conn, $sql);
    ?>
    <!-- Form to edit badges -->
    <form method='post'>
        <table>
            <tr>
                <th>Badge Name</th>
                <th>Badge Description</th>
                <th>Badge Criteria</th>
                <th>Badge Comment</th>
                <th>Badge Rarity</th>
                <th>Badge Steps</th>
            </tr>
            <?php
      
            // Loop through each badge and display its information
            while ($row = mysqli_fetch_assoc($result)) {
                $row['BadgeComment'] = '';
                echo "<tr>";
                echo "<td><input type='text' name='edit[" . $row['BadgeID'] . "][badge_name]' value='" . $row['BadgeName'] . "' required></td>";
                echo "<td><input type='text' name='edit[" . $row['BadgeID'] . "][badge_desc]' value='" . $row['BadgeDesc'] . "' required></td>";
                echo "<td><input type='text' name='edit[" . $row['BadgeID'] . "][badge_criteria]' value='" . $row['BadgeCriteria'] . "' required></td>";
                echo "<td><input type='text' name='edit[" . $row['BadgeID'] . "][badge_comment]' value='" . $row['BadgeComment'] . "'></td>";
                echo "<td><input type='text' name='edit[" . $row['BadgeID'] . "][badge_rarity]' value='" . $row['BadgeRarity'] . "' required></td>";
                echo "<td><input type='text' name='edit[" . $row['BadgeID'] . "][badge_steps]' value='" . $row['BadgeSteps'] . "' required></td>";
                echo "</tr>";
            }
            ?>
            <!-- Add badge button -->
            <tr>
                <!--<td colspan="3"><a href='addbadge.php'><button type='button'>Add Badge</button></a></td>-->
            </tr>
        </table>
        <!-- God pls let this button work I will cry if it doesn't -->
        <button type='submit'>Save Changes</button>
        <div></div>
        <div></div> <!--  master html ui design -->
        <!--  master of questioning why my smooth brain chose stem -->

    </form>
    <form method="post"><input type='submit' name='addBadge' value='Add Badge'></form>

</body>
</html>