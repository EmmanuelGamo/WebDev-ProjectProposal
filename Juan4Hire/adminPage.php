<?php
session_start();
    include("classes/connect.php");
    include("classes/login.php");

    if($_SESSION['acc_level'] != "0"){
        header('location: home.php');
    }
?>

<DOCTYPE !HTML>
<html>
    <head>
        <title>Admin Page</title>
        <link rel="stylesheet" type="text/css" href="adminPage.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500&family=Space+Mono:ital,wght@1,700&display=swap" rel="stylesheet">
        
    </head>
    <body>
        <div class="main">
            <div class="menu">
                <a href="adminPage.php">Home</a>
                <a href="#" onclick="load_users_page()" onload="load_data_users()">Users</a>
                <a href="#" onclick="load_posts_page()" onload="load_data_posts()">Posts</a>
                <a href="logout.php" class="logout">Logout</a>
            </div>
            <div id="content-container" class="body">
            <img src= "J4Hlogo.png" /></a>
            <h1>Welcome to the Admin Page</h1>
        </div>
        </div>




<script>
    function load_users_page(){
        document.getElementById("content-container").innerHTML='<object type="text/php" data="adminUsers.php"></object>';
    }
    function load_posts_page(){
        document.getElementById("content-container").innerHTML='<object type="text/php" data="adminPosts.php"></object>';
    }
    function load_data_users(){
        $.ajax({
            url:"adminUsers.php",
            method:"POST",
            sucess:function(data){
                $('content-container').html(data);
            }
        })
    }
    function load_data_posts(){
        $.ajax({
            url:"adminPosts.php",
            method:"POST",
            sucess:function(data){
                $('content-container').html(data);
            }
        })
    }

</script>
</html>
