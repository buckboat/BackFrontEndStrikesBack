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



    if (isset($_POST['togApprove'])) {

        //echo $_POST['togApprove'];

        $RequestBadgeID = $_POST['togApprove'];

        //echo $RequestBadgeID;

        // Update entry in database
        $sql = "DELETE FROM BadgeRequest WHERE RequestID = '$RequestBadgeID' ";
        
        if (mysqli_query($conn, $sql)) {

            $sql = "UPDATE Badge SET BadgeApproved = 'true' WHERE RequestID = '$RequestBadgeID'  ";
            //echo "Badge updated successfully.";
        //} else {
            //echo "Error updating badge: " . mysqli_error($conn);
        }

        // dont remember how requestbadge and bade where related it seems more like badge should pop 
        // up in the request table if its not aproved and leave the request table when it is
        // doesnt sound like two tables 
        
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
            <th>Name</th>
            <th>Description</th>
            <th>Active</th>
            
          </tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "
            <tr>
                <td>" . $row["EventName"] . "</td>
                <td>" . $row["EventDescription"] . "</td>

                <td>" ;
                
                if($row["ActiveEvent"]  == 1){
                    echo "Yes";
                }
                else{
                    echo "No";
                }

                  echo"  </td>
              </tr>";
            }
            echo "</table> </form>";
        } else {
            echo "0 results";
        }

        ?>




</body>

</html>