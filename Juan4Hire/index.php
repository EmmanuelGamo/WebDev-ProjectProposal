<?php
session_start();
  include("classes/connect.php");
  include("classes/login.php");
  
  function function_alert($message) 
  { 
      echo "<script>alert('$message');</script>";
  }

  $email = "";
  $password = "";
 

  if($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
    $login = new Login();
    $result = $login->evaluate($_POST);
    if ($result != "")
    {
      function_alert("$result");
    }
    elseif($_SESSION['acc_level'] == "0"){
        header("Location: adminPage.php");
        die;
    }
    else
    {
       header("Location: Home.php");
       die;
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
  }

?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel = "stylesheet" type = "text/css" href="login.css">
</head>

<body>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <div id="container">
      <div class="main-content">
        <div class="logo">
        <a href="index.php"><img src= "J4Hlogo.png" /></a>
        </div>
        <div class="login">
          <form method="post">
              <input name = "email" type="text" value="<?php echo $email ?>"  placeholder="Email" class="uname" />
              <div class="overlap-text">
                <input name = "password" type="password" value="<?php echo $password ?>"  placeholder="Password" class="pass" />
              </div>
              <input type="submit" value="Log in" class="btn" />
          </form>
        </div>
      </div>
      <div class="sub-content">
        <div class="signup">
          Don't have an account? <a href ="signup_user.php"> Sign up</a>
        </div>
      </div>
    </div>
</body>
<script>
  //blocks form resubmission when refreshed
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>