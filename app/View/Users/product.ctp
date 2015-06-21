<div id="content" style="height:70%;">

<?php echo $this->Html->script('jQuery');?> 
<script>
   
    $(document).ready(function()
    {
        $('#ca').change(function()
    {        
        var v=$(this).val(); //alert(v);
       
        $.post("<?php echo $this->Html->url(array('action'=>'subcategory_fetcher')); ?>",{'id':v},function(resp)
             {
             	
       if(resp==0)
            {
                alert("Sorry!! not fetched");
            }
            else
                {
                	$('#su').html(resp);
                   
                }
    });
    });
    });



</script>


<div class="welcome" style="text-align:center;">
<h1 class="title"> <span style="color:orange;">Product </span></h1>

	<?php echo $this->Form->create('Product',array('enctype'=>'multipart/form-data','inputDefaults'=>array('div'=>false,'label'=>false))); ?>
	<table  cellpadding="10px" cellspacing="10px">
		<tr>
			<td>
			<label>Product Name</label>
			</td>
			<td>
			<div>
	      <?php echo $this->Form->input('name',array('id'=>'name')); ?>
	      	</div>
	      </td>
	   </tr>
	   <tr> <td>
			<label>Product Image</label>
			</td>
			<td>
				<div>
	       			<?php echo $this->Form->input('image',array('id'=>'image','type'=>'file')); ?>
	   			</div>
	   		</td>
	   </tr>
	   <tr>
	   		<td>
			<label>Select Category</label>
			</td>
			<td>
				<div>
	   				<?php echo $this->Form->select('Category.name',$cat,array('empty'=>'-select-','id'=>'ca','label'=>'Category' )); ?>
	   			</div>
	   		</td>
	   </tr>
	   <tr>
	   		<td>
			<label>Sub Category</label>
			</td>
			<td>
				<div>
				<?php echo $this->Form->input('Sub',array('empty'=>'-select-','id'=>'su','type'=>'select','label'=>'SubCategory')); ?>
				</div>
			 </td>
		</tr>
	   	<tr>
	   		<td>
			<label>Price</label>
			</td>
			<td>
					<div><?php echo $this->Form->input('price',array('id'=>'price','label'=>'Price')); ?> 
					</div>	
			</td>
		</tr>
	   	<tr>
	   		<td>
	   		</td>
	   		<td>
				<div>
					<?php echo $this->Form->end('Add');?>
				</div>
			</td>
		</tr>
</table>
</div>

</div>
