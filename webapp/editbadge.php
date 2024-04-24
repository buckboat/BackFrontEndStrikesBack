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


            //needs a check to see if any changes from saved changes to whats in the database
            // sql with badge id to pull data and check to see if any changes
            // if no changes skip
            // if changes another sql to see if a request with the same badge id exists if it does update the request table
            // if no chages insert into the request table.
            
            // Update the badge in the database 
            $sql = "UPDATE Badge SET BadgeName = '$badge_name', BadgeDesc = '$badge_desc', BadgeCriteria = '$badge_criteria' WHERE BadgeID = '$badge_id'";

            if (mysqli_query($conn, $sql)) {
                echo "Badge updated successfully for BadgeID: $badge_id.<br>";
            } else {
                echo "Error updating badge for BadgeID: $badge_id - " . mysqli_error($conn) . "<br>";
            }
        }

        // Redirect to index.php after updating badges
        //header("Location: index.php");
        
        //exit();
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
            </tr>
            <?php
      
            // Loop through each badge and display its information
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><input type='text' name='edit[" . $row['BadgeID'] . "][badge_name]' value='" . $row['BadgeName'] . "' required></td>";
                echo "<td><input type='text' name='edit[" . $row['BadgeID'] . "][badge_desc]' value='" . $row['BadgeDesc'] . "' required></td>";
                echo "<td><input type='text' name='edit[" . $row['BadgeID'] . "][badge_criteria]' value='" . $row['BadgeCriteria'] . "' required></td>";
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
        



    </form>
    <form method="post"><input type='submit' name='addBadge' value='Add Badge'></form>

</body>

</html>