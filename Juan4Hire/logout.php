<?php

session_start();
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
unset($_SESSION['juan4hire_userid']);
unset($_SESSION['acc_level']);

header("Location:index.php");
die;
?>