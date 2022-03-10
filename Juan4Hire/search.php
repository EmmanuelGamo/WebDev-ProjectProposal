<?php
    session_start();
    include("classes/connect.php");
    include("classes/login.php");    
    include("classes/user.php");
    include("classes/post.php");
    include("classes/image.php");

    $id = $_SESSION['juan4hire_userid'];
    $login = new Login();
    $result = $login->check_user($id);

    if($result)
         {
           //retrieving user data
           $user = new User();
           $userdata = $user->get_userdata($id);
         }

    if(isset($_GET['find'])) {

        $find = addslashes($_GET['find']);

        $sql = "select *from users where first_name like '%$find%' || last_name like '%$find%' limit 30";
        $DB = new Database();
        $results = $DB->read($sql);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search</title>
        <link rel = "stylesheet" type = "text/css" href="searchstyle.css">
    </head>
    <body>
    <?php include("logoutheader.php"); ?>
        <br><div class="row">
        <div class="column">
            <div class="content-container">
            <form method="post">
        <?php
            $User= new User();
            $image_class = new Image();

            if(is_array($results)){
                foreach ($results as $row) {
                    $ROW = $User->get_user($row['userid']);
                    include("users.php");
                }
            }else{
                echo "No matching records were found.";
            }
        ?>
        </form>
            </div>
        </div>
    </div>
     
    </body>
</html>