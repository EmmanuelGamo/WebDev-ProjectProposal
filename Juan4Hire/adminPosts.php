<?php
    session_start();
    include("classes/connect.php");
    include("classes/login.php");
    $connect = mysqli_connect("localhost", "root", "", "juan4hire_db");
    if($_SESSION['acc_level'] != "0"){
        header('location: home.php');
    }
    $output = '';
    $query = "SELECT * FROM posts";
    $result = mysqli_query($connect, $query);
    $output .='
    
        <br/>
        <table style="width: 80px; margin:20px" class="table table-bordered table-striped">
            <tr>
                <th width="5%">id</th>
                <th width="10%">Post ID</th>
                <th width="10%">User ID</th>
                <th width="10%">Post</th>
                <th width="20%">Image</th>
                <th width="20%">Date Created</th>
            </tr>
    ';
    while($row = mysqli_fetch_array($result)) {
        $output .= '
        <tr>
            <td>'.$row["id"].'</td>
            <td>'.$row["postid"].'</td>
            <td>'.$row["userid"].'</td>
            <td>'.$row["post"].'</td>
            <td>'.$row["image"].'</td>
            <td>'.$row["date"].'</td>
        </tr>
        ';
    }
$output .= '</table>';
echo $output;
?>
<DOCTYPE !html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
</html>

