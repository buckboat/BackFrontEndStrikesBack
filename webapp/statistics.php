<?php
//session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php



if ($_SESSION['type'] == 1) { //if login in session is not set
	$_SESSION['Permisson'] = '1';
	header("Location: index.php");
}

?>


<head>
	<title>Stats!</title>
	<link href="style.css" rel="stylesheet" />
</head>

<!-- buttons for different stats-->

<body>
	<div class="login" style="padding-bottom:20px;">

		<div>
			<form method="post" target="_blank" >
				<input type="submit" name="stats1" value="Users with Most Badges" />
				<input type="submit" name="stats2" value="Stats 2" />
				<input type="submit" name="stats3" value="Stats 3" />
				<input type="submit" name="stats4" value="Stats 4" />
				<input type="submit" name="stats5" value="Stats 5" />
				<input type="submit" name="stats6" value="Stats 6" />
			</form>
		</div>




</body>

</html>