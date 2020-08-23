<?php

// Declare all variable needed for Connection
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'ovc';

// Declare Connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

//Check Connection
if (mysqli_connect_errno()) {
  echo 'Connection Failed : ' . mysqli_connect_error();
}
