<!DOCTYPE html>
<?php
  include("classes/connect.php");
  include("classes/signup.php");
  
  function function_alert($message) 
  { 
      echo "<script>alert('$message');</script>";
  }

  $first_name = "";
  $last_name = "";
  $email = "";

  if($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
    $signup = new Signup();
    $result = $signup->evaluate_customer($_POST);
    if ($result != "")
    {
      function_alert("$result");
    }
    else
    {
       echo(
         "<script LANGUAGE='JavaScript'>
           window.alert('Your account has been successfully created');
         window.location.href='index.php';
        </script>");
       die;
    }

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
  }
?> 
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel = "stylesheet" type = "text/css" href="signup.css">
</head>

<body>
    <form method="post" action ="">
      <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
      <div id="container">
        <div class="main-content">
            <div class="logo">
              <a href="index.php"><img src= "J4Hlogo.png" /><a>
            </div>
            <div class="signup">
              <input value="<?php echo $first_name ?>" type="text" name= "first_name" id="text" placeholder="First Name" class="Fname" />
              <input value="<?php echo $last_name ?>" type="text" name="last_name" id="text" placeholder="Last Name" class="Lname" />
              <input type="text" name="email" id="text" placeholder="Email" class="Email" />
              <input type="password" name="password" id="text" placeholder="Password" class="pass" />
              <input type="password" name="con_password"  id="text" placeholder="Confirm Password" class="pass" />
              <input type="submit" id="button" value="Sign Up" class="btn" />
            </div>
        </div>
          <div class="sub-content">
          Create an account as a Commissionist?
            <div class="signup_seller">
                 <a href ="signup.php"> Sign up here! </a>
            </div>
          </div>
      </div>
     
    </form>
</body>
<script>
  //blocks form resubmission when refreshed
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>