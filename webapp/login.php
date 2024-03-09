<?php
session_start();
error_reporting(0);
?>

<?php
$_SESSION['test'] = 'testSession';


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
</head>


<body>

  <title>Login</title>


  <form action="login.php">
    <label for="username">Username:</label>
    <input type="text" id="user" name="user" placeholder="Lets Rock," required><br><br>
    <label for="password">Password:</label>
    <input type="text" id="pass" name="pass" placeholder="Baby!" required><br><br>
    <input type="submit" name="UserLogin" value="Let's Go!">
  </form>



  <!--on succesfull login index page will have more butteasdfasdsddfns to other pages-->

  <body>

<?php

//include_once dirname(__FILE__) . "../..//database_operations/DBConnection.php";
include "..//database_operations/DBConnection.php";


@$username = $_REQUEST['user'];
@$password = $_REQUEST['pass'];

$engine = new DBConnection();
$conn = $engine->connect();


if (isset($_REQUEST['user']) && isset($_REQUEST['pass'])) {


  if (empty('user') || empty('pass')) {

    header("Location: login.php?error=its all wrong");
    echo "wrong";
    echo '2';
    exit();
  }

 else {

  $sql = "SELECT * FROM User WHERE Username = '$username' AND Password='$password'";




  $result = mysqli_query($conn, $sql);


  $row = mysqli_fetch_assoc($result);

  echo $row;

  if ($row['Username'] === $username && $row['Password'] === $password) {

    echo "passed";

    $_SESSION['username'] = $username;
    $_SESSION['type'] = 1;
    header('Location:index.php?error=workgin');
    exit();
  }
}
}

?>




</html>