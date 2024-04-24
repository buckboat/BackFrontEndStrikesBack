<!DOCTYPE html>
<html>
<head>
    <title>Add Event</title>
    <link href="style.css" rel="stylesheet"/>
</head>
<body>
    <h1>Add New Event</h1>
    <form method="post">
        <?php
        if (isset($_POST['insertEvent'])) {
        
            include "..//database_operations/DBConnection.php";
            $engine = new DBConnection();
            $conn = $engine->connect();

            $badge_id = $_POST['badge_ID'];
            $department_id = $_POST['department_ID'];
            $event_name = $_POST['event_name'];
            $event_description = $_POST['event_description'];


        // Insert new Event into the database
        $sql = "INSERT INTO EventBadge (BadgeID, DepartmentID, EventName, EventDescription, QRSVG, DateCreated, ActiveEvent) 
                VALUES ($badge_id,1,'$event_name','$event_description', NULL, NOW(), FALSE);";

        if(mysqli_query($conn, $sql)) {
                    echo "New event added successfully.";
                } else {
                    echo "Error adding badge: " . mysqli_error($conn);
                }
            }
        ?>

        <label for="badge_ID">Badge ID:</label><br>
        <input type="number" id="badge_ID"  name="badge_ID" required><br><br>

        <label for="department_ID">Department ID:</label><br>
        <textarea id="department_ID"  name="department_ID" rows="4" cols="50" required></textarea><br><br>

        <label for="event_name">Event Name:</label><br>
        <textarea id="event_name" name="event_name" rows="4" cols="50" required></textarea><br><br>
        
        <label for="event_description">Event Description:</label><br>
        <textarea id="event_description" name="event_description" rows="4" cols="50" required></textarea><br><br>


        <input type="submit" name="insertEvent" value="Add Event">
    </form>
</body>
</html>