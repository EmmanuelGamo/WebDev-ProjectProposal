<?php 
session_start();
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/post.php");
include("classes/profile.php");


$login = new Login();
$userdata = $login->check_user($_SESSION['juan4hire_userid']);

$user = new User();
$id = $_SESSION['juan4hire_userid'];
$users = $user->get_users($id);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href="style.css">
    <title>Homepage</title>
</head>
<body>
<?php include("logoutheader.php"); ?>  
<div class="row">
        <div class="column">
            <div class="content-container">
            <?php

            if($users)
            {
                foreach ($users as $ROW)
                {
                        include ("users.php");
                }
            }
            ?>
            </div>
        </div>
    </div>
   <div class="footer-container">
       <div class="footer">
           <div class="footer-heading">
               <a href="terms.php">Terms of Service</a>
           </div>
       </div>
   </div>

</body>
</html>