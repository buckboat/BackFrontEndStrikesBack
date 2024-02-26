
<!DOCTYPE html>
<html lang="en">


<?php


//receive from login (page load?) unhash from same username and check they match and throw yes or no to phone
/*
$conn=mysqli_connect("localhost", "test", "test","");
if (!$conn)
{	
	echo " Cannot connect" . mysqli_error();
}

mysqli_select_db($conn, 'GFJ_DB');*/



session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'test';
$DATABASE_PASS = 'test';
$DATABASE_NAME = 'GFJ_DB';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}


if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('');
}



?>

</html>