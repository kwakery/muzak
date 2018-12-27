<?php
if (isset($_POST['registerBtn'])) { // Log in handler
  /* Gather data and put into respected variables */
  $firstName = sanitizeStr($_POST['firstName']);
  $lastName = sanitizeStr($_POST['lastName']);
  $email = sanitize($_POST['email']);
  $cEmail = sanitize($_POST['cEmail']);
  $username = sanitize($_POST['username']);
  $password = sanitize($_POST['password']);
  $cPassword = sanitize($_POST['cpassword']);

  /* Create Account */
  $account = new Account();
  $register = $account->register($firstName, $lastName, $email, $cEmail, $username, $password, $cPassword);

  if (!empty($register))
  {
    foreach($register as $error)
      echo("{$error}<br />");
    die();

  }

}


?>
