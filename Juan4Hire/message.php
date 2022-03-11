<?php 
session_start();
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/post.php");
include("classes/image.php");
include("classes/updateprofile.php");
include("classes/profile.php");
function function_alert($message) 
{ 
    echo "<script>alert('$message');</script>";
}
$login = new Login();
$userdata = $login->check_user($_SESSION['juan4hire_userid']);

if($_SERVER['REQUEST_METHOD'] == "POST")
{   
    $POST->delete_post($_POST['postid']);
    echo(
        "<script LANGUAGE='JavaScript'>
          window.alert('Your portfolio has been updated');
        window.location.href='profile.php';
       </script>");
    die;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages | Juan4Hire</title>
    <style>
            :root 
            {
                font-size: 10px;
            }
            *,
            *::before,
            *::after {
                box-sizing: border-box;
            }
            body {
                font-family: "Open Sans", Arial, sans-serif;
                min-height: 100vh;
                background-color: #fafafa;
                color: #262626;
                padding-bottom: 3rem;
            }
            .container{
                margin-top: 10rem;
                min-height: 400px;
                flex:2.5;
                padding: 20px;
                padding-right: 0px;
            }
            .qtn-container
            {
                margin: auto;
                width: 800px;
                border: solid thin #aaa;
                padding: 10px;
                background-color: white;
            }
            .btn-container{
                    text-align: right;
                }
            .profile-del-btn {
                width: 10%;
                background-color: #9BF89D;
                border: 1px solid #9BFA9D;
                padding: 12px 12px;
                color: #fff;
                font-weight: bold;
                cursor: pointer;
                border-radius: 3px;
            }
            .image{
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
                border: solid thin #aaa;
                padding: 10px;
            }
            h3{
                text-align: center;
                font-weight: bold;
            }
    </style>
</head>
<body>
<?php  include("logoutheader.php");?>
<div class="container">
        <div class="qtn-container">
           
        </div>
    </div>
</body>
</html>