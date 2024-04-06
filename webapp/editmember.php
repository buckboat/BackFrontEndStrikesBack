<!doctype html>
<html>

<head>
    <title>Edit Member</title>
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

    <h1 style="text-align: center;">Edit Member</h1>

    <?php

    include "..//database_operations/DBConnection.php";
    $engine = new DBConnection();
    $conn = $engine->connect();

    if (isset($_POST['editUser'])) {

        $UsernameIndex = $_POST['hiddenID'];
        
    } else {

        $UsernameIndex = $_POST['editmems'];
     
    }


    if (isset($_POST['editUser'])) {

        $EditUserID = $_POST['hiddenID'];
        $EditUserType= $_POST['UserType'];

        // Update entry in database

        // $sql = "DELETE FROM BadgeRequest WHERE RequestID = '$RequestBadgeID' ";
        $sql = "UPDATE User SET UserType = '$EditUserType' WHERE UserID = '$EditUserID' ";


        if (mysqli_query($conn, $sql)) {

            echo "User updated successfully.";

        } else {

            echo "Error updating User: " . mysqli_error($conn);

        }

    }


    ?>



    <form method='post'>
        <?php

        // Fetch data from the "benefits" table
        $sql = "SELECT Username, UserType FROM User WHERE UserID = '$UsernameIndex' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            //echo "<form method='post'>";
            echo "<table>";
            echo "<tr>

            <th>Username</th>
            <th>User Type</th>

            
          </tr>";

            // Output data
            while ($row = $result->fetch_assoc()) {

                /*
                if ($row["RequestApproved"] == TRUE) {
                    continue;
                }*/

                echo "
            <tr>
            
            <td>" . $row["Username"] . "</td>
            <td><input type='text' id='userType' name='userType' value=" . $row['UserType'] . " required></td>

            <input type='submit' id='editUser' name='editUser' value='Submit Changes'>

              </tr>";
            }
            echo " </table>
            
            </form>";

        } else {
            echo "0 results";
        }



        ?>


</body>

</html>