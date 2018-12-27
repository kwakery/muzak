<?php
class Account {
  private $errors; // Array containing errors if applicable

  public function __construct() {
    $this->errors = array();
  }

  /* Validate and Add account to database */
  public function register($fn, $ln, $email, $cemail, $user, $pass, $cpass) {
    /* Validate Inputs */
    $this->validateFirstName($fn);
    $this->validateLastName($ln);
    $this->validateEmail($email, $cemail);
    $this->validateUsername($user);
    $this->validatePassword($pass, $cpass);

    if (!empty($this->errors))
      return $this->errors;
  }

  private function validateFirstName($name) {
    $min = 4;
    $max = 16;

    if (strlen($name) < $min || strlen($name) > $max) // Make sure name is above minimum and lower than maximum
      array_push($this->errors, "Your first name must be between {$min} and {$max} characters.");
  }

  private function validateLastName($name) {
    $min = 4;
    $max = 16;

    if (strlen($name) < $min || strlen($name) > $max) // Make sure name is above minimum and lower than maximum
      array_push($this->errors, "Your last name must be between {$min} and {$max} characters.");
  }

  private function validateEmail($email, $cEmail) {
    $min = 5;
    $max = 25;

    if ($email != $cEmail)
      array_push($this->errors, "Your emails do not match.");

    if (strlen($email) < $min || strlen($email) > $max) {// Make sure name is above minimum and lower than maximum
      array_push($this->errors, "Your email must be between {$min} and {$max} characters.");
      return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($this->errors, "Please enter a valid email.");
      return;
    }

    // TODO: Check if email is unique

  }

  private function validateUsername($user) {
    $min = 4;
    $max = 12;

    if (strlen($user) < $min || strlen($user) > $max) { // Make sure name is above minimum and lower than maximum
      array_push($this->errors, "Your username must be between {$min} and {$max} characters.");
      return;
    }

    // TODO: Check if username is unique
  }

  private function validatePassword($pass, $cPass) {
    $min = 4;
    $max = 14;

    if ($pass != $cPass) {
      array_push($this->errors, "Your passwords do not match.");
      return;
    }

    if (strlen($pass) < $min || strlen($pass) > $max) { // Make sure name is above minimum and lower than maximum
      array_push($this->errors, "Your password must be between {$min} and {$max} characters.");
      return;
    }

    if (preg_match('/[^A-Za-z0-9]/', $pass)) {
      array_push($this->errors, "Your passwords contains illegal characters.");
      return;
    }
  }
}
?>
