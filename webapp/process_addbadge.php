<?php
include "../database_operations/DBConnection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $badge_name = $_POST['badge_name'];
    $badge_desc = $_POST['badge_desc'];
    $badge_criteria = $_POST['badge_criteria'];

    $engine = new DBConnection();
    $conn = $engine->connect();

    $sql = "INSERT INTO Badge (BadgeName, BadgeDesc, BadgeCriteria) 
            VALUES ('$badge_name', '$badge_desc', '$badge_criteria')";

    if (mysqli_query($conn, $sql)) {
        // If insertion is successful redirect to index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
