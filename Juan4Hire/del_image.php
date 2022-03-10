<div class ="img-container">
    <?php 
        if(file_exists($row['image']))
        {
            $post_image = $row['image'];
            $post_desc = $row['post'];
	    	}
    ?>
     <h3><?php echo $post_desc ?></h3> 
	<img src= <?php echo $post_image ?> class="image" title="<?php echo $post_desc ?>"/>
 </div> 