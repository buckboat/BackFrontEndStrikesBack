<!doctype html>
<html>

<head>
    <title>Delete Request</title>
    <link href="style.css" rel="stylesheet" />
</body>

<?php



if ($_SESSION['type'] == 1) { //if login in session is not set
	$_SESSION['Permission'] = '1';
	header("Location: index.php");
}

?>

Deleted...
<?php
//header('refresh:3; Location: ' . $_SERVER['HTTP_REFERER']);
header("refresh: 3; URL = index.php");
?>

</html>