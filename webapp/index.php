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
				require_once dirname(__FILE__, $levels=2) ."/database_operations/Constants.php";

		        
				// Create connection
				$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

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
			if (isset($_POST['CreateDB'])) {
				include('../database_operations/specific_operations/CreateDatabase.php');
			}
			if (isset($_POST['CreateTablesDB'])) {
				include('../database_operations/specific_operations/CreateTables.php');
			}
			if (isset($_POST['DemoDataDB'])) {
				include('../database_operations/specific_operations/LoadDemoData.php');
			}
			if (isset($_POST['ResetDB'])) {
				include('../database_operations/ResetDatabase.php');
			}
			?>
		</div>
		<form method="post">
			<input type="submit" name="CreateDB" value="Create" />
			<input type="submit" name="CreateTablesDB" value="Fill" />
			<input type="submit" name="DemoDataDB" value="Demo" />
			<input type="submit" name="ResetDB" value="Reset" />
		</form>

		<div>



		</div>


</body>

</html>
