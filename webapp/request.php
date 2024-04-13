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
        $sql = "UPDATE BadgeRequest SET isVisible = FALSE WHERE RequestID = '$RequestBadgeID' ";

        if (mysqli_query($conn, $sql)) {


            $EditRequestBadgeName = $_POST['requestName'];
            //echo $EditRequestBadgeNam;

            $EditRequestBadgeDesc = $_POST['requestDesc'];
            //echo $EditRequestBadgeDesc ;

            $EditRequestBadgeCrit = $_POST['requestCrit'];
            //echo $EditRequestBadgeCrit;

            $EditRequestBadgeCom = $_POST['requestCom'];

            $sql = "UPDATE Badge SET BadgeApproved = TRUE WHERE BadgeID = '$RequestBadgeID'  ";
            //echo "Badge updated successfully.";


            //} else {

            //echo "Error updating badge: " . mysqli_error($conn);

        }



    }

    if (isset($_POST['deleteRequest'])) {

        $EditRequestBadgeID = $_POST['hiddenID'];
        $sql = "DELETE FROM BadgeRequest WHERE RequestID = '$EditRequestBadgeID' ";

        if (mysqli_query($conn, $sql)) {

            //echo "Badge updated successfully.";
        } else {
            //echo "Error updating badge: " . mysqli_error($conn);
        }
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
            echo "<tr>";

            if ($_SESSION['type'] == 0) { //
                echo "<th>Approve?</th>";
            }


            echo "
            <th>Badge Name</th>
            <th>Description</th>
            <th>Criteria</th>
            <th>Comment</th>
            <th>Click to Edit</th>
            
          </tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {

                if ($row["isVisible"] == FALSE) {
                    continue;
                }

                echo "<tr>";

                if ($_SESSION['type'] == 0) { //

                    echo "<td class='checkbox'> <input type='submit' id='togApprove' name='togApprove' value='" . $row["RequestID"] . "'>  </td>";
                }

                echo " <td>" . $row["BadgeName"] . "</td>

                <td>" . $row["BadgeDesc"] . "</td>
                <td>" . $row["BadgeCriteria"] . "</td>
                <td>" . $row["Comment"] . "</td>
                <td> <input type='submit' id='editRequestIndex' name='editRequestIndex' value='" . $row["RequestID"] . "'> </td>
              </tr>";
            }
            echo "</table> </form>";

        } else {
            echo "0 results";
        }



        ?>


</body>

</html>