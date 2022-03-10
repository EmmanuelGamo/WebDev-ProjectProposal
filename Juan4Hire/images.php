  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <?php 
        if(file_exists($ROW['image']))
        {
            $post_image = $ROW['image'];
            $post_desc = $ROW['post'];
            $post_id =  $ROW['postid'];
	    	}
    ?>
	<img src= <?php echo $post_image ?>  title="<?php echo $post_desc ?>" id = "myImg" width="100%" height="500px" onclick="openModal();currentSlide(n)"/>
    <div class="text"><?php echo $post_desc ?></div>
    
  </div>