<!DOCTYPE html>
<html>
<head>
    <title>Add Badge</title>
    <link href="style.css" rel="stylesheet"/>
</head>
<body>
    <h2>Add New Badge</h2>
    <form method="post">
        <?php
        if (isset($_POST['insertBadge'])) {
        
            include "..//database_operations/DBConnection.php";
            $engine = new DBConnection();
            $conn = $engine->connect();

            $badge_name = $_POST['badge_name'];
            $badge_desc = $_POST['badge_desc'];
            $badge_criteria = $_POST['badge_criteria'];
            $badge_comment = $_POST['badge_comment'];
            $badge_rarity = $_POST['badge_rarity'];
            $badge_steps = $_POST['badge_steps'];

        // Insert new badge request into the database
        $sql = "INSERT INTO BadgeRequest (UserID, BadgeName, BadgeDesc, BadgeCriteria, BadgeRarity, BadgeSteps, Comment, isVisible) 
                VALUES ('{$_SESSION['UserID']}', '$badge_name', '$badge_desc', '$badge_criteria', '$badge_rarity', '$badge_steps', '$badge_comment', 1)";

        if(mysqli_query($conn, $sql)) {
                    echo "New badge added successfully.";
                } else {
                    echo "Error adding badge: " . mysqli_error($conn);
                }
            }
        ?>

        <label for="badge_name">Badge Name:</label><br>
        <input type="text" id="badge_name" name="badge_name" required><br><br>

        <label for="badge_desc">Badge Description:</label><br>
        <textarea id="badge_desc" name="badge_desc" rows="4" cols="50" required></textarea><br><br>

        <label for="badge_criteria">Badge Criteria:</label><br>
        <textarea id="badge_criteria" name="badge_criteria" rows="4" cols="50" required></textarea><br><br>
        
        <label for="badge_comment">Comment:</label><br>
        <textarea id="badge_comment" name="badge_comment" rows="4" cols="50" required></textarea><br><br>

        <label for="badge_rarity">Badge Rarity:</label><br>
        <textarea id="badge_rarity" name="badge_rarity" rows="4" cols="50" required></textarea><br><br>

        <label for="badge_steps">Badge Steps:</label><br>
        <textarea id="badge_steps" name="badge_steps" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" name="insertBadge" value="Add Badge Request">
    </form>
</body>
</html>