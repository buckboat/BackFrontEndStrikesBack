<!-- This page will be called to calculate the statistic specified by the calling page -->
<!-- These queries still need to be tested -->
<?php

	// Server credentials
	$servername = "localhost";
	$username = "test";
	$password = "test";
	$dbname = "test";
	

	// Create server/database connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn)
	{
		die("Conection failed: " . mysqli_connect_error());
	}


	// 1. User with most Badges earned
	$user_most_badges = mysqli_query($conn, "SELECT UserID, COUNT(*) AS NumberOfBadges FROM UserBadge GROUP BY UserID
    ORDER BY NumberOfBadges DESC LIMIT 1");

	// ?? What is the return type for a php query ?? //
	if (mysqli_num_rows($user_most_badges) > 0)	
	{
		while($row = mysqli_fetch_assoc($user_most_badges))
		{
			echo "User with the most badges earned: " . $row["UserID"]. "<br>";
		}
	} else {
		echo "0 results";
	}


	// 2. % of students that have earned a specific Badge
	// will probably pass the UserID from calling page
	// $badge_id = data_input
	$students_with_badge = mysqli_query($conn, "SELECT BadgeID, COUNT(*) AS EarnedFrequency FROM UserBadge WHERE BadgeID='3'"); // Change  -> BadgeID=$badge_id

	// 3. Total number of existing users
	$total_users = mysqli_query($conn, "SELECT COUNT(*) FROM User");
	

	// 4. Number of Active Users per duration of Time
	// ASSUMPTION: The data being passed in will be of datetime datatype
	// $start_date
	$users_per_time = mysqli_query($conn, "SELECT * FROM User WHERE LastLogin>='2024-02-13 19:48:59'"); // Change datetime -> LastLogin >= $start_date


	// 5. Number of Badges earned per Department
	$department_badges_earned = mysqli_query($conn, "SELECT DepartmentID, COUNT(*) AS NumberOfBadges FROM UserDepartment  JOIN UserBadge ON UserDepartment.UserID = UserBadge.UserID GROUP BY DepartmentID");


	// *** FRONT END WILL NEED IMPLEMENT ***
	// 6. Total Time spent on the App


	// 7. Most frequently awarded Badges
	$badge_most_earned = mysqli_query($conn, "SELECT BadgeID, COUNT(*) AS FrequencyEarned FROM UserBadge GROUP BY BadgeID
	ORDER BY FrequencyEarned DESC LIMIT 1");


	// Close connection after use
	mysqli_close($conn);

?>