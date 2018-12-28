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
  </head>
  <body>
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
            <input type="password" id="password" name="password" value="" placeholder="password" value="<?php echo getInput('password'); ?>" required>
          </p>
          <p>
            <label for="cpassword">Confirm Password:</label>
            <input type="password" id="cpassword" name="cpassword" value="" placeholder="password" required>
          </p>
          <button type="submit" name="registerBtn">Register</button>
        </form>
    </div>
  </body>
</html>
