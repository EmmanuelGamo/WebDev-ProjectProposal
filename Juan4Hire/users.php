<div class="card">
<?php
   if(file_exists($ROW['profile_image']))
   {
       $dp = $ROW['profile_image'];
   }

?>
<div class="card-image"> <img src= <?php echo $dp ?> class="card-image" alt=""> </div>
    <h2> <?php echo $ROW['first_name'] . " " . $ROW['last_name'] ?><h2>
    <p><?php echo $ROW['category']. $ROW['description'] ?></p>
    <a href="">More</a>
</div>


