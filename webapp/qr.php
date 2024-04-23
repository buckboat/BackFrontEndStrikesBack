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


        if (isset($_POST['eventQR']))

            $badgeID = $_POST['eventQR'];

            $EventName = $_POST['hiddenName'];

            echo $EventName;
            echo ' <br> ';
            echo '<img src="generateQRCode.php?id=' . $badgeID . '" />';
            ?>

        </div>




</body>

</html>