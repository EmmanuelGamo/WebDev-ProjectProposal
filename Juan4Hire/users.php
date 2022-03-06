<div class="card">
    <?php
        if(file_exists($ROW['profile_image']))
        {
            $dp = $ROW['profile_image'];
        }
        else
            {
                $dp = 'uploads/default.jpg';  
            }

    ?>
        <div class="card-image"> <img src= <?php echo $dp ?> class="card-image" alt="">
        </div>
            <h2> <?php echo $ROW['first_name'] . " " . $ROW['last_name'] ?></h2>
            <p><?php echo $ROW['category']?><br>
            <p><?php echo $ROW['description']?></p>

            <a href="ViewProfile.php?id=<?php echo $ROW['userid']; ?>">More</a>
</div>


