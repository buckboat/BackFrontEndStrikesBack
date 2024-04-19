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
				<input type="submit" name="stats2" value="Most Frequently Awarded Badges" />
				<input type="submit" name="stats3" value="Number of Active Users" />
				<input type="submit" name="stats4" value="Percentage of Users with Badge" />
				<input type="submit" name="stats5" value="Total Users" />
				<input type="submit" name="stats6" value="Badges Per Department" />
			</form>
		</div>




</body>

</html>