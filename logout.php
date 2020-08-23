<?php

//Start Session
session_start();

//Clear Data in Session
session_destroy();

//Redirect to Login Form
header("location:index.php?message=logout");
