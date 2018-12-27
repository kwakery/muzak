<?php
if (isset($_POST['loginBtn'])) { // Register handler
  $username = sanitize($_POST['username']);
  $password = sanitize($_POST['password']);
}

?>
