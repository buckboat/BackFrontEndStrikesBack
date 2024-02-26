<!DOCTYPE html>
<html lang="en">

<head>
		<title>Login</title>
</head>


<body>

    <title>Login</title>


<form action="/index.php">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username"><br><br>
  <label for="password">Password:</label>
  <input type="text" id="password" name="password"><br><br>
  <input type="submit" name="loginWithAccount" value="Let's Go!">
</form> 

<?php
		if(isset($_POST['loginWithAccount'])) { 
			include('index.php');
        } 
		if(isset($_POST['BTNreset'])) { 
        
			echo "<pre>gfj_db reset to default values!\n </pre>";
        } 
		?> 

<!--on succesfull login index page will have more butteasdfasdsddfns to other pages-->

<body>

</html>
