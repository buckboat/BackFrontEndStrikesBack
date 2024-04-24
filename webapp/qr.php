<?php
//session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php



if ($_SESSION['type'] == 1) { //if login in session is not set
    $_SESSION['Permission'] = '1';
    header("Location: index.php");
}

?>


<head>
    <title>Stats!</title>
    <link href="style.css" rel="stylesheet" />
</head>

<!-- buttons for different stats-->

<body>
    <div class="login" style="text-align: center;">

        <div>

            <?php
                include "..//database_operations/DBConnection.php";
                $engine = new DBConnection();
                $conn = $engine->connect();


        if (isset($_POST['eventQR']))

            $badgeID = $_POST['eventQR'];

            $sql = "SELECT EventName FROM EventBadge WHERE BadgeID = '$badgeID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();
            
            echo "<h1>";
            echo $row["EventName"];
            echo "</h1>";

            echo ' <br> ';
            echo '<img src="generateQRCode.php?id=' . $badgeID . '" />';
        }
            ?>

        </div>




</body>

</html>