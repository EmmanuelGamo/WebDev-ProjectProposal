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
    <link rel = "stylesheet" type = "text/css" href="useronly.css">
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
        <button class="btn profile-edit-btn" id = "editprof" >Edit Profile</button>
        </div>
        <div class="profile-bio">

        <div class="profile-bio">
        <p><span class="profile-email"><?php echo $userdata['email']?></span><br>
            </p>
        </div>
    </div>

</div>
<div id="editModal" class="modal">
                <div class="modal-content">
                    <span class="close2">&times;</span>
                    <div class="profilearea"> 
                        <form method="post" enctype="multipart/form-data"> 
                            <div class="change-profile-image">
                                <img id="frame" src= <?php echo $image ?> alt="">
                            </div>
                            <input class="changeprofile" type = "file" name = "file" onchange="preview()"><br><br>
                   
                            <input type = "text" class = "textarea" name = "first_name" value = "<?php echo $userdata['first_name']?>"><br><br>
                            <input type = "text" class = "textarea" name = "last_name" value = "<?php echo $userdata['last_name']?>"><br><br>
                            <input type = "text" class = "textarea" name = "email" value = "<?php echo $userdata['email']?>"><br><br>
                            <input class ="save_button" name="change" type= "submit" value = "Save"/>
                            <br>
                        </form>
                    </div>
                </div>  
             </div>
<script>
     var modal2 = document.getElementById("editModal");
    var btn2 = document.getElementById("editprof");
    var span2 = document.getElementsByClassName("close2")[0];
    btn2.onclick = function()
    {
        modal2.style.display = "block";
    }
    span2.onclick = function() 
    {
        modal2.style.display = "none";
   
    }
    window.onclick = function(event)
    {
        if (event.target == modal) 
        {
            modal2.style.display = "none";
        }
    }
//blocks form resubmission when refreshed
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>