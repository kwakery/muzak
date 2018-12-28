<?php
  $result = true;

  require("$_SERVER[DOCUMENT_ROOT]/../config.php");
  require("includes/classes/User.php");
  require("includes/functions.php");
  require("includes/handlers/login-handler.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>

    <link rel="stylesheet" href="/assets/css/login.css">
  </head>
  <body>
    <div id="background">
      <div class="overlay"></div>
      <div id="loginContainer">
        <div id="inputContainer">
          <form id="loginFrm" action="login.php" method="post">
            <h2>Login to your Account</h2>
            <?php if (!$result) echo("<li><span class=\"errorMsg\">Incorrect username or password provided.</span><br /></li>\n"); ?>
            <p>
              <label for="username">Username:</label>
              <input type="text" id="username" name="username" placeholder="johndoe21" required>
            </p>
            <p>
              <label for="password">Password:</label>
              <input type="password" id="password" name="password" value="" placeholder="somethingsecret" required>
            </p>
            <button type="submit" name="loginBtn">LOGIN</button>
            <p class="authPrompt"><a href="/register.php">Don't already have an account? Click here to register.</a></p>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
