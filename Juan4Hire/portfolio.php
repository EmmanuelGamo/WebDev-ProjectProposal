<div class="gallery-item" tabindex="0">
	<?php 
        if(file_exists($ROW['image']))
        {
            $post_image = $ROW['image'];
          
	    	}
    ?>
	<img src= <?php echo $post_image ?> class="gallery-image" alt="" id = "myImg">
</div>

<div id="ViewModal" class="modal">
        <div class="modal-content">
            <span class="close3">&times;</span>
            <div class="imagearea"> 
             <?php 
                if(file_exists($ROW['image']))
                {
                    $post_image = $ROW['image'];
                }
            ?>
	        <img src= <?php echo $post_image ?> class="gallery-image" alt="" >
            </div>
        </div>  
</div>