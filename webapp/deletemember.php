<!doctype html>
<html>

<head>
	<title>Delete Member</title>
	<link href="style.css" rel="stylesheet"/>

    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

    <h1 style="text-align: center;">Delete Members</h1>

    <?php
        include "..//database_operations/DBConnection.php";
        $engine = new DBConnection();
        $conn = $engine->connect();

        if(isset($_POST['deleteMember'])){
            $id = $_GET['Username'];

            // Prepare a delete statement
            $stmt = $conn->prepare("DELETE FROM User WHERE Username = ?");
            $stmt->bind_param("i", $id);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Member deleted successfully";
            } else {
                echo "Error deleting member: " . $conn->error;
            }
            
        }


    ?>

    <!-- Form to display entries and delete -->
    <form style="padding-bottom:25px;" method="post" action="">
        <label for="Username">Username:</label>
        <input type="text" id="Username" name="Username" required>
        <button type="submit" name="deleteMember">Delete Member</button>
    </form>

</body>
</html>