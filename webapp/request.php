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

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>

</head>

<body>

<h1 style="text-align: center;" >Requests</h1>


    <?php

    include "..//database_operations/DBConnection.php";
    $engine = new DBConnection();
    $conn = $engine->connect();

    ?>

    <h1 class="Permission">


        <img src="Spooky.png" style=" display:flex; vertical-align:middle; color:red; " width="355" height="355">


    </h1>

    <?php

// Fetch data from the "benefits" table
$sql = "SELECT * FROM BadgeRequest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Event Name</th>
            <th>Description</th>
          </tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["RequestID"]."</td>
                <td>".$row["BadgeName"]."</td>
                <td>".$row["Comment"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>


</body>

</html>