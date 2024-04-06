<!doctype html>
<html>

<head>
	<title>Add Member</title>
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

    <h1 style="text-align: center;">Add Members</h1>

    <?php
        include "..//database_operations/DBConnection.php";
        $engine = new DBConnection();
        $conn = $engine->connect();

    if(isset($_POST['addMember'])){
        $id = $_POST['Username'];

        $stmt = $conn->prepare("INSERT INTO  User (UserType, Username, Password, LastLogin) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("issssss", $UserType, $Username, $Password, $LastLogin);

        // Set parameters and execute
        $UserType = $_POST['UserType'];
        $Username = $_POST['Username'];
        $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
        $LastLogin = $_POST['LastLogin'];
        $stmt->execute();

        echo "New customer added successfully";

        $stmt->close();

        include('memberinfo.php');
    }
    ?>

    <!-- Form to display entries and delete -->
    <form style="padding-bottom:25px;" method="post" action="">
        <label for="Username">Username:</label>
        <input type="text" id="Username" name="Username" required>
        <label for="UserType">User Type:</label>
        <input type="number" id="UserType" name="UserType" required>
        <label for="Password">Password:</label>
        <input type="text" id="Password" name="Password" required>
        <label for="LastLogin">Current time and date (YYYY-MM-DD HR:MIN:SEC):</label>
        <input type="text" id="Password" name="Password" required>
        <button type="submit" name="addMember">Add Member</button>
    </form>

</body>
</html>