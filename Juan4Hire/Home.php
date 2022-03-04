<?php 
session_start();
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/post.php");

if(isset($_SESSION['juan4hire_userid'])&&is_numeric($_SESSION['juan4hire_userid']))
{
    $id = $_SESSION['juan4hire_userid'];
    $login = new Login();
    $result = $login->check_user($id);

    if($result)
         {
           //retrieving user data
           $user = new User();
           $userdata = $user->get_userdata($id);
        if(!$userdata)
            {
                include("logoutheader.php");
            }
            else
            { 
                include("logoutheader.php");
               
            }
        }
}
else
{
    include("header.php");
}
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
           <div class="footer-heading footer-1">
               <a href="#">Contact us</a>
           </div>
           <div class="footer-heading footer-2">
               <a href="#">Privacy Policy</a>
           </div>
           <div class="footer-heading footer-3">
               <a href="#">Terms of Service</a>
           </div>
       </div>
   </div>

</body>
</html>