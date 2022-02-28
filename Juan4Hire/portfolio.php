<div class="gallery-item" tabindex="0">
	<?php 
        if(file_exists($ROW['image']))
        {
            $post_image = $ROW['image'];
		}
    ?>
	<img src= <?php echo $post_image ?> class="gallery-image" alt="">
</div>
	