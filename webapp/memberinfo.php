<!doctype html>
<html>

<head>
    <title>Members Index </title>
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

    <h1 style="text-align: center;">Members</h1>


    <?php

    include "..//database_operations/DBConnection.php";
    $engine = new DBConnection();
    $conn = $engine->connect();

    if ($_SESSION['type'] == 1) { //if login in session is not set
        $_SESSION['Permission'] = '1';
        header("Location: index.php");
    }

    if (isset($_POST['editUser'])) {

        $EditUserID = $_POST['hiddenID'];
        $EditUserType = $_POST['userType'];

        // Update entry in database

        // $sql = "DELETE FROM BadgeRequest WHERE RequestID = '$RequestBadgeID' ";
        $sql = "UPDATE User SET UserType = CAST('$EditUserType' AS CHAR) WHERE UserID = CAST('$EditUserID' AS CHAR) ";


        if (mysqli_query($conn, $sql)) {

            //echo "User updated successfully.\n";
            
        } else {

            //echo "Error updating User: " . mysqli_error($conn);

        }
    }

    ?>

    <form method='post'>
        <?php

        // Fetch data from the "benefits" table
        $sql = "SELECT * FROM User";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            //echo "<form method='post'>";
            echo "<table>";
            echo "<tr>
            <th>Username</th>
            <th>User Type</th>
            <th>Last Login</th>
            <th>Click to Edit</th>
            
          </tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "
            <tr>
                <td>" . $row["Username"] . "</td>
                
                <td>" ;
                
                if($row["UserType"]  == 1){
                    echo "Moderator";
                }
                elseif($row["UserType"]  == 2){
                    echo "User";
                }
                else{
                    echo "Manager";
                }

                  echo"  </td>
                <td>" . $row["LastLogin"] . "</td>
                <td> <input type='submit' id='editmems' name='editmems' value='" . $row["UserID"] . "'> </td>
              </tr>";
            }
            echo "</table> </form>";
        } else {
            echo "0 results";
        }

        ?>
<!--
    <form style="padding-top:25px;" method="post">
		<input type="submit" name="addmems" value="Add Members" />
	</form>

    <form style="padding-top:5px;" method="post">
		<input type="submit" name="delmems" value="Delete Members" />
	</form>
-->


</body>

</html>