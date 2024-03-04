<!DOCTYPE html>
<head>
<title>Edit Badge</title>
<link href="style.css" rel="stylesheet"/>
</head>
<body>

<?php
include 'DBConnection.php';
include 'leftside.php';
include 'topbar.php';

// Check if form is submitted
if(isset($_POST['edit'])){
    $badge_id = $_POST['badge_id'];
    $badge_name = $_POST['badge_name'];
    $badge_desc = $_POST['badge_desc'];
    $badge_criteria = $_POST['badge_criteria'];
    
    // Update entry in database
    $sql = "UPDATE Badge SET BadgeName = '$badge_name', BadgeDesc = '$badge_desc', BadgeCriteria = '$badge_criteria' WHERE BadgeID = $badge_id";
    if(mysqli_query($conn, $sql)){
        echo "Badge updated successfully.";
    } else {
        echo "Error updating badge: " . mysqli_error($conn);
    }
}

// Fetch the badge data
$badge_id = $_GET['id'];
$sql = "SELECT * FROM Badge WHERE BadgeID = $badge_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!-- Form to edit badge -->
<form method="post" action="">
    <input type="hidden" name="badge_id" value="<?php echo $row['BadgeID']; ?>">
    <label for="badge_name">Badge Name:</label>
    <input type="text" id="badge_name" name="badge_name" value="<?php echo $row['BadgeName']; ?>" required><br>
    <label for="badge_desc">Badge Description:</label>
    <input type="text" id="badge_desc" name="badge_desc" value="<?php echo $row['BadgeDesc']; ?>" required><br>
    <label for="badge_criteria">Badge Criteria:</label>
    <input type="text" id="badge_criteria" name="badge_criteria" value="<?php echo $row['BadgeCriteria']; ?>" required><br>
    <button type="submit" name="edit">Edit Badge</button>
</form>

</body>
</html>