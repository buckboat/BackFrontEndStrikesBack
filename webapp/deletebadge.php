<!doctype html>
<html>

<head>
	<title>Delete Badge</title>
	<link href="style.css" rel="stylesheet"/>
</head>
<?php
    include 'DBConnection.php';
    include "topbar.php";
    include "leftside.php";

if(isset($_POST['delete'])){
    $id = $_POST['BadgeID'];
    
    echo "<script>
            var result = confirm('Are you sure you want to delete this entry?');
            if(result){
                window.location.href = 'badgedeletion.php?id=$id';
            }
          </script>";
}
?>

<!-- Form to display entries and delete -->
<form method="post" action="">
    <label for="BadgeID">Entry ID:</label>
    <input type="text" id="BadgeID" name="BadgeID" required>
    <button type="submit" name="delete">Delete Badge</button>
</form>

</body>
</html>