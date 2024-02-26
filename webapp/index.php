<!doctype html>
<html>

<head>
	<title>Lumberjack Rewards</title>
	<link href="style.css" rel="stylesheet"/>
</head>

<body>
	<br />
	<div>
		<div>

			<div>
				<?php

				include "topbar.php";
				include "leftside.php";

				?>
			</div>


			<div >
				
				<?php

		        
				// Create connection
				$conn = new mysqli("localhost", "test", "test", "");

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				// Check if database exists
				$checkDatabaseQuery = "SHOW DATABASES LIKE 'gfj_db'";
				$result = $conn->query($checkDatabaseQuery);

				if ($result->num_rows == 0) {
					// The database does not exist, so create it and populate it
					ob_start();
					include('FISHPROJECT_DB_Table_Creation.php');
					include('FISH_FILL_TABLES.php');
					ob_end_clean();
					//echo "<pre>gfj_db not found, creating and populating\n </pre>";
				} else {
					//echo "<pre>gfj_db found! no need to recreate and repopulate\n </pre>";
				}
				//echo "<pre>database is ready\n </pre>";
				?>

			</div>


		</div>
	</div>
	<div class="main">


		<!-- form for navigation/execution -->
		<div class="login" style="padding-bottom:20px;">
		<form method="post">
			<input type="submit" name="Login" value="Login" />
		</form>
			</div>
		<div style="border: 4px solid black; padding: 5px;">

			<!-- button functionality -->
			<?php
			if (isset($_POST['Login'])) {
				include('login.php');
			}
			if (isset($_POST['Stats'])) {
				include('statistics.php');
			}
			if (isset($_POST['stats1'])) {
				include('test.php');
			}
			if (isset($_POST['stats2'])) {
			
			}
            if (isset($_POST['stats3'])) {
			
			}
            if (isset($_POST['stats4'])) {
			
			}
            if (isset($_POST['stats5'])) {
			
			}
            if (isset($_POST['stats6'])) {
			
			}
			?>
		</div>


</body>

</html>