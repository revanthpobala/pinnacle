<?php echo $this->Html->script('jQuery'); ?>

<script>
	
	$(document).ready(function()		//function for delete thrugh ajax
	{
		$('.del').click(function()
		{
			
			var v=$(this).val();
			var s=$(this).attr('id');
			//alert(v);
				
			$.post("delete",{'id':v,'delid':s},function(resp){			
			if(resp==0)
			alert("Not Deleted");
			else
			{
			resp=resp.trim();
			var resp1='#'+resp;
			//alert($(me).html());
			$(resp1).parent('td').parent('tr').fadeOut();
			}
			});
			
			
			
		});
		
	});
	
</script>
<?php echo $this->Html->link('Add New Cms',array
					('controller' => 'Contents', 'action' => 'cms')); ?>
<table height="200px" width="400px">
				<tr> 
						
				    	<th>Page Name</th>
				    	<th>Content</th>
				    	
				     	<th>Edit</th>
				     	<th>Delete</th>
				</tr>
				<?php $Sn=1; foreach($posts as $post):?>
				<tr>
					<td class="th"><?php echo $post['Content']['search_name']; ?> </td>
					<td class="th"><?php 
					echo $post['Content']['about'];?></td>
					
					<td class="th"><?php echo $this->Html->link('Edit',array
					('controller' => 'Contents', 'action' => 'edit',
					 $post['Content']['id'])); ?></td>
					 
					<td class="th"><?php echo $this->Form->button('Delete',
					array('class'=>'del','id'=>'del'.$Sn++,'value'=>
					 $post['Content']['id'])); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			
			</table>
	
