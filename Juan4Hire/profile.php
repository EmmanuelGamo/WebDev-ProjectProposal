<!DOCTYPE html>
<?php 

session_start();
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
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
            header("Location:login.php");
            die;
        }

    }else{
        header("Location:login.php");
        die;
    }
}else
{
    header("Location:login.php");   
    die;
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Juan4Hire</title>
    <link rel = "stylesheet" type = "text/css" href="profile.css">
</head>
<body>
<?php 
include("logoutheader.php");?>
<div class="container">
    <div class="profile">
        <div class="profile-image">

            <img src="https://st.depositphotos.com/2101611/3925/v/600/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg" alt="">
        </div>

        <div class="profile-user-settings">

            <h1 class="profile-user-name"><?php echo $userdata['first_name'] . " " . $userdata['last_name']?></h1>

            <button class="btn profile-edit-btn">Edit Profile</button>

        </div>

        <div class="profile-bio">
        <p><span class="profile-email"><?php echo $userdata['email']?></span><br>
            <p class = "description"> Hardworking Student    
            </p>
        </div>
    </div>
    <div class = "btn-container">
    <button class="post" id="post">Post something</button>
    </div>
    <div class = "divider"><span class ="dividertext">Sample Works</span></div>

</div>

<main>

	<div class="container">

		<div class="gallery">

			<div class="gallery-item" tabindex="0">

				<img src="https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?w=500&h=500&fit=crop" class="gallery-image" alt="">

			</div>

			<div class="gallery-item" tabindex="0">

				<img src="https://images.unsplash.com/photo-1497445462247-4330a224fdb1?w=500&h=500&fit=crop" class="gallery-image" alt="">

			

			</div>

			<div class="gallery-item" tabindex="0">

				<img src="https://images.unsplash.com/photo-1426604966848-d7adac402bff?w=500&h=500&fit=crop" class="gallery-image" alt="">

			</div>

		</div>
		<!-- End -->
		<div class="loader"></div>
	</div>
</main>




</body>
</html>