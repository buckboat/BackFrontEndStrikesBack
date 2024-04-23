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


    
	
    ?>



    <form method='post'>
        <?php

        // Fetch data from the "benefits" table
        $sql = "SELECT * FROM User WHERE UserID = '$UsernameIndex' ";
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
                echo "
                <tr>
                
                <td>" . $row["Username"] . "</td>
                <td><input type='text' id='userType' name='userType' value=" . $row['UserType'] . " required></td>
                <input type='hidden' name='hiddenID' value='" . $row['UserID'] . "'>
                </tr>";
            }
            echo " </table>
            <input type='submit' id='editUser' name='editUser' value='Submit Changes'>
            <input type='submit' id='backToMems' name='backToMems' value='Back to Members'>
            </form>";

        } else {
            echo "0 results\n
            <input type='submit' id='backToMems' name='backToMems' value='Back to Members'>";
        }

        ?>


</body>

</html>