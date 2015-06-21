<div class="row">
								<h2 class="title"></h1>
							</div>

  	<?php 

    foreach ($posts as $post) 
  		{
  		 echo $post['Content']['content'];
       
        } ?>
    <?php unset($post); ?>

 
