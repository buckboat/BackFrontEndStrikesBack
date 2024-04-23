<?php
session_start();
error_reporting(0);
?>

<?php

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

  <!-- Login inputs -->

  <div class="loginpage">

    <form action="login.php">
      <label for="username">Username:</label>
      <input type="text" id="user" name="user" placeholder="Lets Rock," required><br><br>
      <label for="password">Password:</label>
      <input type="password" id="pass" name="pass" placeholder=" Baby!" required><br><br>
      <input type="submit" name="UserLogin" value="Lets Go!">
    </form>

  </div>





  <?php

  //db Connections

  include "..//database_operations/DBConnection.php";
  $engine = new DBConnection();
  $conn = $engine->connect();

  @$username = $_REQUEST['user'];
  @$password = $_REQUEST['pass'];



  // login input checks

  // checks to see if inputs entered
  if (isset($_REQUEST['user']) && isset($_REQUEST['pass'])) {

    // if empty redirect to login
    if (empty('user') || empty('pass')) {

      header("Location: login.php?error=its all wrong");

      exit();

      // else find the username and password for the username

    } else {

      $sql = "SELECT * FROM User WHERE Username = '$username' AND Password='$password'";

      $result = mysqli_query($conn, $sql);

      $row = mysqli_fetch_assoc($result);

      // if username and password matches save the session username and account type

      if ($row['Username'] === $username && $row['Password'] === $password) {





        $sql =  "SELECT UserType,UserID  FROM User WHERE Username = '$username'";

        $result = mysqli_query($conn, $sql);



        while ($row = mysqli_fetch_array($result)) {

          $_SESSION['type'] = intval($row['UserType']);
          $_SESSION['UserID'] = intval($row['UserID']);

          $cat = intval($row['UserID']);

          $sql = "UPDATE User SET LastLogin = NOW() WHERE UserID = '$cat'";
  
          mysqli_query($conn, $sql);
          
        }


        //password verify and password hash commands for php.
        $_SESSION['username'] = $username;
        $_SESSION['Permission'] = -1;

        header('Location:index.php');
        exit();
      }
    }
  }


  ?>

</body>


</html>