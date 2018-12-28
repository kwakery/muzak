<?php
  require("$_SERVER[DOCUMENT_ROOT]/../config.php");
  require("includes/classes/User.php");
  require("includes/functions.php");
  require("includes/handlers/login-handler.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
  </head>
  <body>
    <div id="inputContainer">
      <form id="loginFrm" action="register.php" method="post">
        <h2>Login to your Account</h2>
        <p>
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" placeholder="username" required>
        </p>
        <p>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" value="" placeholder="password" required>
        </p>
        <button type="submit" name="loginBtn">Log In</button>
      </form>
    </div>
  </body>
</html>
