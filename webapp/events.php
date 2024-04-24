<!doctype html>
<html>

<head>
    <title>Events Index </title>
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

    <h1 style="text-align: center;">Events</h1>


    <?php

    include "..//database_operations/DBConnection.php";
    $engine = new DBConnection();
    $conn = $engine->connect();

    ?>

    <?php


if (isset($_POST['deleteEvent'])) {

    $EditEventBadgeID = $_POST['hiddenID'];
    $sql = "DELETE FROM EventBadge WHERE EventBadgeID = '$EditEventBadgeID' ";

    if (mysqli_query($conn, $sql)) {

        //echo "Badge updated successfully.";
    } else {
        //echo "Error updating badge: " . mysqli_error($conn);
    }
}

    ?>






    <form method='post'>
        <?php

        // Fetch data from the "benefits" table
        $sql = "SELECT * FROM EventBadge";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            //echo "<form method='post'>";
            echo "<table>";
            echo "<tr>
            <th>Badge ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Active</th>
            <th>QR Code</th>
            <th>Edit Event?</th>
            
          </tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "
            <tr>
                <td>" . $row["BadgeID"] . " </td>
                <td>" . $row["EventName"] . "
                <input type='hidden' name='hiddenName' value='" . $row['EventName'] . "'> </td>
                <td>" . $row["EventDescription"] . "</td>
                

                <td>" ;
                
                if($row["ActiveEvent"]  == 1){
                    echo "Yes";
                }
                else{
                    echo "No";
                }

                  echo"  </td>
                  <td> <input type='submit' id='eventQR' name='eventQR' value='" . $row["BadgeID"] . "'> </td>
                  <td> <input type='submit' name='editEventIndex' value='" . $row["EventBadgeID"] . "'> </td>
              </tr>";
            }
            echo "</table> 
            
        

            </form>";
        } else {
            echo "0 results";
        }

        

        ?>

<br></br>


</form>
    <form method="post"><input type='submit' name='addEvent' value='Add Event'></form>

</body>

</html>