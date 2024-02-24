<!doctype html>
<html>

<head>
	<title>Lumberjack Rewards</title>
	<link href="style.css" rel="stylesheet"/>
</head>



<body>

<?php
	include "leftside.php";
	?>

	<div class="container">

		<h1 style="text-align:center">

			<img src="spirit-logo-purple-tn2.jpg" alt="" width="64" height="64">

			Lumberjack Rewards

		</h1>


	</div>

	<br />
	<div class="container">
		<div class="row">

			<div class="col-sm-4">
				<?php

				include "leftside.php";

				?>
			</div>


			<div class="col-sm-8">
				/*
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
				echo "<pre>database is ready\n </pre>";
				?>

			</div>


		</div>
	</div>
	<div>


		<!-- form for navigation/execution -->
		<form method="post">
			<input type="submit" name="Login" value="Login" />
		</form>

		<div style="border: 4px solid black; padding: 5px;">

			<!-- button functionality -->
			<?php
			if (isset($_POST['Login'])) {
				include('login.php');
			}
			if (isset($_POST['B'])) {
				echo "<pre>reset button pressed\n </pre>";
				$conn->query("DROP DATABASE gfj_db");
				ob_start();
				include('FISHPROJECT_DB_Table_Creation.php');
				include('FISH_FILL_TABLES.php');
				ob_end_clean();
				echo "<pre>gfj_db reset to default values!\n </pre>";
			}
			?>
		</div>

		<div>
			<h2>Link to Indexes</h2>
			<button onclick="location.href=''">test button</button>
			<button onclick="location.href=''">Goes no where</button>
		</div>

</body>

</html>
