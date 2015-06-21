<table id="srch" border="1px" cellpadding="5px" cellspacing="1px">
    <tr>
    	<th>Image</th>
        <th>Product</th>
		 <th>Category</th>
		 
		 <th>Price</th>
       
    </tr>

  <span style="font-size:23px">
    <?php 
  
    foreach ($r as $post):
    
    // if($post['Product']['status']==0)
    # {

    ?>
    <tr>
    <td>
						<?php //echo $this->Html->image("/products/".$post['Product']['image'],array('width'=>'50px','height'=>'50px'));?>
						</td>
			<td><?php echo $post['Category']['name'];?>
						</td>
						
						<td><?php //echo $post['Category']['name'];?>
						</td>
						
						
						<td><?php //echo $post['Category']['price'];?>
						</td>
				       
				
      
    <?php #}
     endforeach;
 
 
 unset($post);    ?> 
    
</table>
       
