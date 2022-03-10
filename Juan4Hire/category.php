<?php 
session_start();
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/post.php");
include("classes/image.php");
include("classes/updateprofile.php");
include("classes/profile.php");


$login = new Login();
$userdata = $login->check_user($_SESSION['juan4hire_userid']);

if(isset($_GET['id']))
{
    $categoryid = $_GET['id'];
    if($categoryid == "000")
    {
        $user = new User();
        $id = $_SESSION['juan4hire_userid'];
        $category = "Arts & Design";
        $users = $user->get_category($id,$category);
        
    }
    elseif($categoryid == "001")
    {
        $user = new User();
        $id = $_SESSION['juan4hire_userid'];
        $category = "Electronics";
        $users = $user->get_category($id,$category);   
    }
    elseif($categoryid == "010")
    {
        $user = new User();
        $id = $_SESSION['juan4hire_userid'];
        $category = "Handcraft";
        $users = $user->get_category($id,$category);  
    }
    elseif($categoryid == "011")
    {
        $user = new User();
        $id = $_SESSION['juan4hire_userid'];
        $category = "Support";
        $users = $user->get_category($id,$category);  
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href="category.css">
    <title><?php echo  $category?>|| Juan4Hire </title>
</head>
<body>
<?php  include("logoutheader.php");?>
<div class = "container" >
<h1><?php echo  $category?></h1>
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
</div>
</body>
</html>