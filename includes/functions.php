<?php
/* Sanitize user input to prevent sql injection */
function sanitize($data) {
  $data = strip_tags($data); // Remove tags
  $data = str_replace(" ", "", $data); // Remove all spaces

  return $data;
}

/* Sanitize string and format it */
function sanitizeStr($data) {
  $data = sanitize($data);
  $data = strtolower($data);
  $data = ucfirst($data);

  return $data;
}

function getInput($name) {
  if (isset($_POST[$name]))
    return $_POST[$name];
}

function isBetween($data, $min, $max) {
  return strlen($data) >= $min && strlen($data) <= $max;
}

?>
