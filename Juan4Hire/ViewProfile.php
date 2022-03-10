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
$profile = new Profile();
$profile_data = $profile->get_profile($_GET['id']);
if(is_array($profile_data))
{
$userdata = $profile_data[0];
}

//posting
if(isset($_POST['upload'])) 
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $post = new Post();
            $id = $_SESSION['juan4hire_userid'];
            $result = $post->create_post($id, $_POST, $_FILES);
            echo(
                "<script LANGUAGE='JavaScript'>
                  window.alert('Your portfolio has been updated');
                window.location.href='profile.php';
               </script>");
              die;
        }
        else
        {
            function_alert("Please upload JPEG and PNG image only!");
        }
    }
elseif(isset($_POST['change'])) 
    {   
        if($_FILES['file']['name'])
        {
            if($_FILES['file']['type'] == "image/jpeg" || $_FILES['file']['type'] == "image/png") 
            {
                $filename = "uploads/" . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'] , $filename);
                $image = new Image();
                $image->crop_image($filename,$filename,800,800);

                if(file_exists($filename))
                {
                    $userid = $userdata['userid'];
                    $query = "update users set profile_image = '$filename' where userid = '$userid' limit 1";
                    
                    $DB = new Database(); 
                    $DB->save($query);
                }
            }
            else
            {
                function_alert("Please upload JPEG and PNG image only!");
            }
        }
        else
        {
           
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $id = $_SESSION['juan4hire_userid'];
            $update = new EditProf();
            $result = $update->evaluate($id,$_POST);
            if ($result != "")
            {
                function_alert("$result");
            }
            else
            {
                echo(
                    "<script LANGUAGE='JavaScript'>
                    window.alert('Your profile has been successfully updated');
                    window.location.href='profile.php';
                    </script>");
                die;
            }
        } 
    }
    //get posts
    $post = new Post();
    $id = $userdata['userid'];
    $posts = $post->get_posts($id);
    $image_class = new Image();

    //other profile

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Juan4Hire</title>
    <link rel = "stylesheet" type = "text/css" href="profile.css">
</head>
<body>
<?php  include("logoutheader.php");?>
<div class="container">
    <div class="profile">
        <div class="profile-image">
            <?php 
                $image = "";
                if(file_exists($userdata['profile_image']))
                {
                    $image = $userdata['profile_image'];
                }
                else{
	                    $image = 'uploads/default.jpg';  
                }
            ?>
            <img src= <?php echo $image ?> alt="">
        </div>

        <div class="profile-user-settings">

            <h1 class="profile-user-name"><?php echo $userdata['first_name'] . " " . $userdata['last_name']?></h1>
        </div>

        <div class="profile-bio">
        <p><span class="profile-email"><?php echo $userdata['email']?></span><br>
            <span class="profile-category">Area of Expertise: <?php echo $userdata['category']?></span><br>
            <p class = "description"> <?php echo $userdata['description']?>
            </p>
        </div>
    </div>
    <div class="btn-container">
    <a href = "Home.php">
            <input type ="button" class="btn profile-msg-btn" value ="Message">
                </a>
        </div>
        <br>
    <div class = "divider"><span class ="dividertext">Portfolio</span></div>
</div>
<main>
	<div class="container">
        <div class="gallery">
                <?php
              
                    if($posts)
                    {   
                        foreach ($posts as $ROW)
                        {
                                include ("othersportfolio.php");
                        }
                    }
                ?>
        </div>
	</div>
</main>
<div id="ViewModal" class="modal">
        <div class="modal-content">
            <span class="close3">&times;</span>
            <div class="imagearea"> 
            <?php
                                include ("viewImage.php");
                        
                ?>
            </div>
        </div>  
</div>
<script>
    var modal3 = document.getElementById("ViewModal");
    var btn3 = document.getElementById("myImg");
    var span3 = document.getElementsByClassName("close3")[0];
    function openModal()
     {
  document.getElementById("ViewModal").style.display = "block";
    }
    span3.onclick = function() 
    {
        modal3.style.display = "none";
   
    }
    window.onclick = function(event)
    {
        if (event.target == modal) 
        {
            modal3.style.display = "none";
        }
    }
//blocks form resubmission when refreshed
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>