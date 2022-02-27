<?php

session_start();
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
unset($_SESSION['juan4hire_userid']);

header("Location:login.php");
die;
?>