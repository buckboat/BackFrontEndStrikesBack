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

        $RequestBadgeID = $_POST['hiddenID'];
    } else {

        $RequestBadgeID = $_POST['editRequestIndex'];
    }


    if (isset($_POST['editRequest'])) {

        $EditRequestBadgeID = $_POST['hiddenID'];
        $EditRequestBadgeName = $_POST['requestName'];
        $EditRequestBadgeDesc = $_POST['requestDesc'];
        $EditRequestBadgeCrit = $_POST['requestCrit'];
        $EditRequestBadgeCom = $_POST['requestCom'];

        // Update entry in database

        // $sql = "DELETE FROM BadgeRequest WHERE RequestID = '$RequestBadgeID' ";
        $sql = "UPDATE BadgeRequest SET BadgeName = '$EditRequestBadgeName', BadgeDesc = '$EditRequestBadgeDesc', BadgeCriteria ='$EditRequestBadgeCrit' , Comment='$EditRequestBadgeCom' WHERE RequestID = '$EditRequestBadgeID' ";


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
            <th>Click to Delete Request</th>

            
          </tr>";

            // Output data
            while ($row = $result->fetch_assoc()) {

                if ($row["isVisible"] == FALSE) {
                    continue;
                }

                echo "
            <tr>
            
            <td><input type='text' id='requestName' name='requestName' value=" . $row['BadgeName'] . " required></td>
            <td><input type='text' id='requestDesc' name='requestDesc' value=" . $row['BadgeDesc'] . " required></td>
            <td><input type='text' id='requestCrit' name='requestCrit' value=" . $row['BadgeCriteria'] . " required></td>
            <td><input type='text' id='requestCom' name='requestCom' value=" . $row['Comment'] . " required></td> 
            <td><input type='submit' id='deleteRequest' name='deleteRequest' value='" . $row['RequestID'] . " '>
            <input type='hidden' name='hiddenID' value='" . $row['RequestID'] . "'> </td>

            <input type='submit' id='editRequest' name='editRequest' value='Submit Request Edits'>

              </tr>";
            }
            echo " </table>
            <input type='submit' id='backRequest' name='backRequest' value='Back to Request Index'>
            </form>";
        } else {
            echo "0 results";
        }

        

        ?>



</body>

</html>