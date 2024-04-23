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
        
            // include "..//database_operations/DBConnection.php";
            // $engine = new DBConnection();
            // $conn = $engine->connect();

            $badge_name = $_POST['badge_name'];
            $badge_desc = $_POST['badge_desc'];
            $badge_criteria = $_POST['badge_criteria'];
            $badge_comment = $_POST['badge_comment'];

            // Insert new badge into the database
            $sql = "INSERT INTO BadgeRequest (BadgeName, BadgeDesc, BadgeCriteria, Comment, isVisible) 
                    VALUES ('$badge_name', '$badge_desc', '$badge_criteria', '$badge_comment', 1)";
            
            $result = db->run($sql);
            if($result) {
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

        <input type="submit" name="insertBadge" value="Add Badge Request">
    </form>
</body>
</html>