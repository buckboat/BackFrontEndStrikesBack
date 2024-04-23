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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
            include "..//database_operations/DBConnection.php";
            $engine = new DBConnection();
            $conn = $engine->connect();

            $badge_name = $_POST['badge_name'];
            echo $badge_name;
            $badge_desc = $_POST['badge_desc'];
            echo $badge_desc;
            $badge_criteria = $_POST['badge_criteria'];
            echo $badge_criteria;

            // Insert new badge into the database
            $sql = "INSERT INTO BadgeRequest (BadgeName, BadgeDesc, BadgeCriteria,isVisible) 
                    VALUES ('$badge_name', '$badge_desc', '$badge_criteria',1)";

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

        <input type="submit" name="insertBadge" value="Add Badge">
    </form>
</body>
</html>