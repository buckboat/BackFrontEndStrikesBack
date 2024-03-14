<?php
session_start();
error_reporting(0);
?>

<?php
$_SESSION['test'] = 'testSession';

include 'topbar.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <link href="style.css" rel="stylesheet" />
</head>


<body class="loginback">

  <title>Login</title>

  <div class="loginpage">

    <form action="login.php">
      <label for="username">Username:</label>
      <input type="text" id="user" name="user" placeholder="Lets Rock," required><br><br>
      <label for="password">Password:</label>
      <input type="password"  id="pass" name="pass" placeholder=" Baby!" required><br><br>
      <input type="submit" name="UserLogin" value="Lets Go!">
    </form>

  </div>

  <!--on succesfull login index page will have more butteasdfasdsddfns to other pages-->



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
    } else {

      $sql = "SELECT * FROM User WHERE Username = '$username' AND Password='$password'";




      $result = mysqli_query($conn, $sql);


      $row = mysqli_fetch_assoc($result);



      if ($row['Username'] === $username && $row['Password'] === $password) {

        echo "passed";
        echo $username;


        $sql =  "SELECT UserType  FROM User WHERE Username = '$username'";

        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
          echo $row['UserType'];
          $_SESSION['type'] = intval($row['UserType']);
        }

        // $row = mysqli_fetch_assoc($result);

        //echo $;

        //$UserType =  intval($result[0]);

        //password verify and password hash commands for php.


      }



      $_SESSION['username'] = $username;

      header('Location:index.php?error=workgin');
      exit();
    }
  }


  ?>

</body>


</html>