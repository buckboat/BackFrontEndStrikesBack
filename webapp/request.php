<!doctype html>
<html>

<head>
    <title>Request Index </title>
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

    <h1 style="text-align: center;">Requests</h1>


    <?php

    include "..//database_operations/DBConnection.php";
    $engine = new DBConnection();
    $conn = $engine->connect();



    if (isset($_POST['togApprove'])) {

        //echo $_POST['togApprove'];

        $RequestBadgeID = $_POST['togApprove'];

        //echo $RequestBadgeID;

        // Update entry in database
        // $sql = "DELETE FROM BadgeRequest WHERE RequestID = '$RequestBadgeID' ";
        $sql = "UPDATE BadgeRequest SET RequestApproved = TRUE WHERE RequestID = '$RequestBadgeID' ";

        if (mysqli_query($conn, $sql)) {


            $sql = "UPDATE Badge SET BadgeApproved = TRUE WHERE BadgeID = '$RequestBadgeID'  ";
            //echo "Badge updated successfully.";
            //} else {
            //echo "Error updating badge: " . mysqli_error($conn);
        }

        // dont remember how requestbadge and bade where related it seems more like badge should pop 
        // up in the request table if its not aproved and leave the request table when it is
        // doesnt sound like two tables 

    }


    ?>

    <h1 class="Permission">


        <img src="Spooky.png" style=" display:flex; vertical-align:middle; color:red; " width="355" height="355">


    </h1>



    <form method='post'>
        <?php

        // Fetch data from the "benefits" table
        $sql = "SELECT * FROM BadgeRequest";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            //echo "<form method='post'>";
            echo "<table>";
            echo "<tr>
            <th>Approve?</th>
            <th>Badge Name</th>
            <th>Description</th>
            <th>Criteria</th>
            <th>Comment</th>
            <th>Click to Edit</th>
            
          </tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {

                if ($row["RequestApproved"] == TRUE) {
                    continue;
                }

                echo "
            <tr>
                
            <td class='checkbox'> 
            <input type='submit' id='togApprove' name='togApprove' value='" . $row["RequestID"] . "'>  </td>
                <td>" . $row["BadgeName"] . "</td>
                <td>" . $row["BadgeDesc"] . "</td>
                <td>" . $row["BadgeCriteria"] . "</td>
                <td>" . $row["Comment"] . "</td>
                <td> <input type='submit' id='editRequestIndex' name='editRequestIndex' value='" . $row["RequestID"] . "'> </td>
              </tr>";
            }
            echo "</table> </form>";
            //post request id to indvidiaul requestbadge page to edit the requestbadge
        } else {
            echo "0 results";
        }



        ?>


        <!-- <form method="post" style="padding-top:20px;">
            <input type="submit" name="Approve" value="Approve">
        </form> -->


</body>

</html>