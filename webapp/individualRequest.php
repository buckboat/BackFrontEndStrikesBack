<!doctype html>
<html>

<head>
    <title>Individual Request</title>
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

    <h1 style="text-align: center;">Edit Request</h1>


    <?php

    include "..//database_operations/DBConnection.php";
    $engine = new DBConnection();
    $conn = $engine->connect();

    if (isset($_POST['editRequest'])) {

        $RequestBadgeID = $_POST['editRequest'];

    } else {

        $RequestBadgeID = $_POST['editRequestIndex'];
    }


    if (isset($_POST['editRequest'])) {

        //echo $_POST['togApprove'];

        $EditRequestBadgeID = $_POST['editRequest'];
        $EditRequestBadgeName = $_POST['requestName'];
        $EditRequestBadgeDesc = $_POST['requestDesc'];
        $EditRequestBadgeCrit = $_POST['requestCrit'];
        $EditRequestBadgeCom = $_POST['requestCom'];


        //echo $RequestBadgeID;

        // Update entry in database
        // $sql = "DELETE FROM BadgeRequest WHERE RequestID = '$RequestBadgeID' ";
        $sql = "UPDATE BadgeRequest SET BadgeName = '$EditRequestBadgeName ', BadgeDesc = '$EditRequestBadgeDesc', BadgeCriteria = '$EditRequestBadgeCrit', Comment = '$EditRequestBadgeCom' WHERE RequestID = '$EditRequestBadgeID' ";

        if (mysqli_query($conn, $sql)) {


            $sql = "UPDATE Badge SET BadgeApproved = TRUE WHERE RequestID = '$EditRequestBadgeID'  ";

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
        $sql = "SELECT * FROM BadgeRequest WHERE RequestID = '$RequestBadgeID' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            //echo "<form method='post'>";
            echo "<table>";
            echo "<tr>

            <th>Badge Name</th>
            <th>Description</th>
            <th>Criteria</th>
            <th>Comment</th>

            
          </tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {

                if ($row["RequestApproved"] == TRUE) {
                    continue;
                }

                echo "
            <tr>

            <td><input type='text' id='requestName' name='requestName' value=" . $row['BadgeName'] . " required></td>
            <td><input type='text' id='requestDesc' name='requestDesc' value=" . $row['BadgeDesc'] . " required></td>
            <td><input type='text' id='requestCrit' name='requestCrit' value=" . $row['BadgeCriteria'] . " required></td>
            <td><input type='text' id='requestCom' name='requestCom' value=" . $row['Comment'] . " required></td>

            <input type='submit' id='editRequest' name='editRequest' value='Edit " . $row['RequestID'] . " '>

              </tr>";
            }
            echo " </table>
            
            </form>";
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