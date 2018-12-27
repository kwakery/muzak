<?php
  include_once("includes/classes/Account.php");
  include_once("includes/functions.php");
  include("includes/handlers/register-handler.php");
  include("includes/handlers/login-handler.php");

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

        <form id="registerFrm" action="register.php" method="post">
          <h2>Register Your Account</h2>
          <p>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" placeholder="John" required>
          </p>
          <p>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" placeholder="Doe" required>
          </p>
          <p>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="john.doe@gmail.com" required>
          </p>
          <p>
            <label for="cEmail">Confirm Email:</label>
            <input type="email" id="cEmail" name="cEmail" placeholder="john.doe@gmail.com" required>
          </p>
          <p>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="username" required>
          </p>
          <p>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="" placeholder="password" required>
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
