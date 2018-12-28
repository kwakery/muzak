<?php
if (isset($_POST['loginBtn'])) { // Register handler
  $username = sanitize($_POST['username']);
  $password = sanitize($_POST['password']);

  $user = new User($conn);
  $result = $user->login($username, $password);

  if ($result) {
    $_SESSION['loggedin'] = true;
    $_SESSION['user'] = $username;
    header("Location: index.php");
  }
}

?>
