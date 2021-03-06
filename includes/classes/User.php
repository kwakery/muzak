<?php
class User {
  private $errors; // Array containing errors if applicable
  private $conn; // MySQL Connection

  /* User details */
  private $firstname;
  private $lastname;
  private $email;
  private $username;
  private $password; // hashed with bcrypt

  private function hasErrors() {
    return !empty($this->errors);
  }

  public function __construct($conn) {
    $this->conn = $conn;
    $this->errors = array();
  }

  public function login($name, $password) {
    $query = 'SELECT * FROM users WHERE username = ? LIMIT 1';
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param('s', $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows < 1)
      return false;

    $user = $result->fetch_assoc();
    $successful = password_verify($password, $user['password']);

    $stmt->close();
    return $successful;
  }

  /* Validate and Add account to database */
  public function register($fn, $ln, $email, $cemail, $user, $pass, $cpass) {
    /* Validate Inputs */
    $this->validateFirstName($fn);
    $this->validateLastName($ln);
    $this->validateEmail($email, $cemail);
    $this->validateUsername($user);
    $this->validatePassword($pass, $cpass);

    /* Attempt to insert data */
    $this->insert();

    if ($this->hasErrors())
      return $this->errors;
  }

  private function insert() {
    if ($this->hasErrors())
      return;
    echo 'test';
    $query = 'INSERT INTO users (username, password, name, lastname, email) VALUES (?, ?, ?, ?, ?)';
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("sssss", $this->username, $this->password, $this->firstname, $this->lastname, $this->email);
    $stmt->execute();
    $stmt->close();
  }

  private function validateFirstName($name) {
    $min = 4;
    $max = 16;

    if (!isBetween($name, $min, $max)) {
      array_push($this->errors, "Your first name must be between {$min} and {$max} characters.");
      return;
    }

    $this->firstname = $name;
  }

  private function validateLastName($name) {
    $min = 4;
    $max = 16;

    if (!isBetween($name, $min, $max)) {
      array_push($this->errors, "Your last name must be between {$min} and {$max} characters.");
    }

    $this->lastname = $name;
  }

  private function validateEmail($email, $cEmail) {
    $min = 5;
    $max = 25;

    if ($email != $cEmail) {
      array_push($this->errors, 'Your emails do not match.');
      return;
    }

    if (!isBetween($email, $min, $max)) {
      array_push($this->errors, "Your email must be between {$min} and {$max} characters.");
      return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($this->errors, 'Please enter a valid email.');
      return;
    }

    $query = 'SELECT COUNT(*) FROM users WHERE email = ?';
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $count = $stmt->get_result()->fetch_row()[0];
    if ($count > 0) {
      array_push($this->errors, 'Please enter an email that hasn\'t already been used.');
      return;
    }

    $this->email = $email;
    $stmt->close();
  }

  private function validateUsername($name) {
    $min = 4;
    $max = 12;

    if (!isBetween($name, $min, $max)) {
      array_push($this->errors, "Your username must be between {$min} and {$max} characters.");
      return;
    }

    $query = 'SELECT COUNT(*) FROM users WHERE username = ? LIMIT 1';
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $count = $stmt->get_result()->fetch_row()[0];
    if ($count > 0) {
      array_push($this->errors, 'Please enter a username that hasn\'t already been used.');
      return;
    }

    $this->username = $name;
    $stmt->close();
  }

  private function validatePassword($pass, $cPass) {
    $min = 4;
    $max = 14;

    if ($pass != $cPass) {
      array_push($this->errors, 'Your passwords do not match.');
      return;
    }

    if (!isBetween($pass, $min, $max)) {
      array_push($this->errors, "Your password must be between {$min} and {$max} characters.");
      return;
    }

    if (preg_match('/[^A-Za-z0-9]/', $pass)) {
      array_push($this->errors, 'Your passwords contains illegal characters.');
      return;
    }

    $options = [
        'cost' => 12,
    ];

    $this->password = password_hash($pass, PASSWORD_BCRYPT, $options);
  }
}
?>
