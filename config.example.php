<?php
// include("$_SERVER[DOCUMENT_ROOT]/../config.php");
ob_start();

date_default_timezone_set('America/Los_Angeles');

$DB = [
  "server" => 'localhost',
  "user" => 'root',
  "pass" => '',
  "name" => 'muzak',
];

$conn = new mysqli($DB['server'], $DB['user'], $DB['pass'], $DB['name']);

// check connection
if ($conn->connect_error)
  die('Database connection failed: '.$conn->connect_error);


?>
