<!DOCTYPE html>
<head>
<title>Edit Badge</title>
<link href="style.css" rel="stylesheet"/>
</head>
<body>

<?php

include "..//database_operations/DBConnection.php";
$engine = new DBConnection();
$conn = $engine->connect();

// Check if form is submitted
if(isset($_POST['edit'])){
    $badge_id = $_POST['badge_id'];
    $badge_name = $_POST['badge_name'];
    $badge_desc = $_POST['badge_desc'];
    $badge_criteria = $_POST['badge_criteria'];
    
    // Create a request to update the badge
    $sql = "INSERT INTO BadgeRequest (BadgeID, BadgeName, BadgeDesc, BadgeCriteria, Comment) VALUES ('$badge_id', '$badge_name', '$badge_desc', '$badge_criteria', 'Requested changes')";
    if(mysqli_query($conn, $sql)){
        echo "Request submitted successfully. It will be updated after approval.";
        // Redirect to View Badges page after submitting the request
        header("Location: view_badges.php");
        exit(); // Make sure to exit after redirecting
    } else {
        echo "Error submitting request: " . mysqli_error($conn);
    }
}

// Fetch all badges from the database
$sql = "SELECT * FROM Badge";
$result = mysqli_query($conn, $sql);
?>

<!-- Form to edit badge -->
<form method="post" action="">
    <?php
    // Loop through each badge and display its information
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<input type='hidden' name='badge_id' value='" . $row['BadgeID'] . "'>";
        echo "<label for='badge_name'>Badge Name:</label>";
        echo "<input type='text' id='badge_name' name='badge_name' value='" . $row['BadgeName'] . "' required><br>";
        echo "<label for='badge_desc'>Badge Description:</label>";
        echo "<input type='text' id='badge_desc' name='badge_desc' value='" . $row['BadgeDesc'] . "' required><br>";
        echo "<label for='badge_criteria'>Badge Criteria:</label>";
        echo "<input type='text' id='badge_criteria' name='badge_criteria' value='" . $row['BadgeCriteria'] . "' required><br>";
        echo "<button type='submit' name='edit'>Submit Request</button>";
        echo "</div>";
    }
    ?>
</form>

</body>
</html>