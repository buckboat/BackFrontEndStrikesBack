<!doctype html>
<html>

<head>
    <title>Edit Event</title>
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

    <h1 style="text-align: center;">Edit Event</h1>

    <?php

    include "..//database_operations/DBConnection.php";
    $engine = new DBConnection();
    $conn = $engine->connect();

    if (isset($_POST['editEvent'])) {

        $EventBadgeID = $_POST['hiddenID'];
    } else {

        $EventBadgeID = $_POST['editEventIndex'];
    }


    if (isset($_POST['editEvent'])) {

        $EditEventBadgeID = $_POST['eventBadgeID'];
        $EditEventBadgeName = $_POST['eventName'];
        $EditEventBadgeDesc = $_POST['eventDesc'];
        $EditEventBadgeActive = $_POST['eventActive'];
        $EditEventBadgeDept = $_POST['eventDeptID'];

        // Update entry in database

        // $sql = "DELETE FROM BadgeRequest WHERE RequestID = '$EventBadgeID' ";
        $sql = "UPDATE EventBadge SET BadgeID = '$EditEventBadgeID', DepartmentID = $EditEventBadgeDept, EventName ='$EditEventBadgeName' , EventDescription='$EditEventBadgeDesc',ActiveEvent = $EditEventBadgeActive WHERE EventBadgeID = '$EventBadgeID' ";


        if (mysqli_query($conn, $sql)) {

            echo "Badge updated successfully.";

        } else {

            echo "Error updating badge: " . mysqli_error($conn);

        }
    }


    ?>


    <form method='post'>
        <?php

 
        // Fetch data from the "benefits" table
        $sql = "SELECT * FROM EventBadge WHERE EventBadgeID = '$EventBadgeID' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            //echo "<form method='post'>";
            echo "<table>";
            echo "<tr>

            <th>Badge ID</th>
            <th>Department ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Active</th>
            <th>Click to Delete Event</th>

            
          </tr>";

            // Output data
            while ($row = $result->fetch_assoc()) {

          

                echo "
            <tr>
            
            <td><input type='text'  name='eventBadgeID' value=" . $row['BadgeID'] . " ></td>
            <td><input type='text'  name='eventDeptID' value=" . $row['DepartmentID'] . " ></td>
            <td><input type='text'  name='eventName' value=\"".$row['EventName']."\"></td>
            <td><input type='text'  name='eventDesc' value=\"" . $row['EventDescription'] . "\" ></td> 
            <td><input type='text'  name='eventActive' value='" . $row['ActiveEvent'] . " '></td>
            <td><input type='submit'  name='deleteEvent' value='" . $row['EventBadgeID'] . " '>
            <input type='hidden' name='hiddenID' value='" . $row['EventBadgeID'] . "'> </td>

            <input type='submit' name='editEvent' value='Submit Event Edits'>

              </tr>";
            }
            echo " </table>
            <input type='submit' id='backEvent' name='backEvent' value='Back to Event Index'>
            </form>";
        } else {
            echo "0 results";
        }

        

        ?>



</body>

</html>