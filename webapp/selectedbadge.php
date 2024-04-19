<!DOCTYPE html>
<html>
<head>
    <title>Selected Badge</title>
    <link href="style.css" rel="stylesheet"/>
</head>
<body>

<?php
// Include database connection file
include "..//database_operations/DBConnection.php";
$engine = new DBConnection();
$conn = $engine->connect();

if(isset($_GET['id'])) {
    $badge_id = $_GET['id'];
    
    $sql = "SELECT * FROM Badge WHERE BadgeID = '$badge_id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $badge = mysqli_fetch_assoc($result);
?>
        <!-- Display badge information -->
        <h1><?php echo $badge['BadgeName']; ?></h1>
        <p><strong>Description:</strong> <?php echo $badge['BadgeDesc']; ?></p>
        <p><strong>Criteria:</strong> <?php echo $badge['BadgeCriteria']; ?></p>

        <!-- Back button to return to editbadge.php -->
        <a href="editbadge.php"><button type="button">Back</button></a>
<?php
    } else {
        echo "Badge not found.";
    }
} else {
    echo "Badge ID not provided.";
}
?>

</body>
</html>
