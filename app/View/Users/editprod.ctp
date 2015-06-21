<?php echo $this->html->script('jQuery'); ?>
<script>
 $(document).ready(function()
    {
 $('#ca').change(function()
    {        
        var v=$(this).val();
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
  <?php echo $this->Form->create('Product',array('enctype'=>'multipart/form-data')); 
   echo $this->Form->input('name',array('id'=>'name','label'=>'Product Name')); 
	   	echo $this->Form->input('image',array('id'=>'image','type'=>'file')); 
	   	echo $this->Form->select('Category.name',$cat,array('empty'=>'-select-','id'=>'ca','label'=>'Category' )); 
	   	echo $this->Form->input('Sub',array('empty'=>'-select-','id'=>'su','type'=>'select','label'=>'SubCategory')); 
		echo $this->Form->end('Add');?>
