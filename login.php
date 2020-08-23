<?php

//Declare Session
session_start();

//Include needed files
include 'connection.php';

//Catch Posted Data
$username = $_POST['username'];
$password = $_POST['password'];

//Query First
$query = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";

//Checking Login Data
$row = mysqli_num_rows(mysqli_query($conn, $query));

//Set Up Session with Login Account
if ($row > 0) {
  $_SESSION['user'] = $username;
  $_SESSION['status'] = 'loggedin';

  header('location: videocenter/index.php');
} else {
  header('location:index.php?message=failed');
}
