<?php
  require("$_SERVER[DOCUMENT_ROOT]/../config.php");
  require("includes/classes/User.php");
  require("includes/functions.php");
  require("includes/handlers/register-handler.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>

    <link rel="stylesheet" href="/assets/css/register.css">
  </head>
  <body>
    <div id="background">
      <div class="overlay"></div>
      <div id="registerContainer">
        <div id="inputContainer">
          <form id="registerFrm" action="register.php" method="post">
            <h2>Register Your Account</h2>
            <?php
              if (!empty($errors))
              {
                echo "<ul>\n";

                foreach($errors as $error)
                  echo("<li><span class=\"errorMsg\">{$error}</span><br /></li>\n");

                  echo "</ul>";
              }
            ?>
            <p>
              <label for="firstName">First Name:</label>
              <input type="text" id="firstName" name="firstName" placeholder="John" value="<?php echo getInput('firstName'); ?>" required>
            </p>
            <p>
              <label for="lastName">Last Name:</label>
              <input type="text" id="lastName" name="lastName" placeholder="Doe" value="<?php echo getInput('lastName'); ?>" required>
            </p>
            <p>
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" placeholder="john.doe@gmail.com" value="<?php echo getInput('email'); ?>" required>
            </p>
            <p>
              <label for="cEmail">Confirm Email:</label>
              <input type="email" id="cEmail" name="cEmail" placeholder="john.doe@gmail.com" required>
            </p>
            <p>
              <label for="username">Username:</label>
              <input type="text" id="username" name="username" placeholder="username" value="<?php echo getInput('username'); ?>" required>
            </p>
            <p>
              <label for="password">Password:</label>
              <input type="password" id="password" name="password" value="" placeholder="somethingsecret" value="<?php echo getInput('password'); ?>" required>
            </p>
            <p>
              <label for="cpassword">Confirm Password:</label>
              <input type="password" id="cpassword" name="cpassword" value="" placeholder="somethingsecret" required>
            </p>
            <button type="submit" name="registerBtn">REGISTER</button>
            <p class="authPrompt"><a href="/login.php">Already have an account? Click here to log in.</a></p>
          </form>
        </div>
        <div id="rightText">
          <h1>Stream the best hits, here.</h1>
          <h2>Use our free service for your needs.</h2>
        </div>
      </div>
    </div>
  </body>
</html>
