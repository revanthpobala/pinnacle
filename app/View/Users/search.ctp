<?php echo $this->Html->script('jQuery');?> 
<script>
   
    $(document).ready(function()
    {
    	var userid="";
		var catid="";
		var subcat="";
		var product="";
    	$('#usr').change(function(){
    			$('#srch').html("");
    			var u=$("#usr").val();
				var c=$("#ca").val();
				var s=$("#su").val();
				var p=$("#pro").val();
    			//var u=$(this).val();
    			//alert(u);
    			$.post("<?php echo $this->Html->url(array('action'=>'searchin')); ?>",{'ajx':'user','userid':u,'catid':c,'subcat':s,'product':p},function(resp)	{
    			
    			$('#srch').html(resp);
    	});
    		});
    		
    		
        $('#ca').change(function()
   			 {        
        			var c=$("#ca").val(); 
        			var s=$("#su").val("");
        			$('#srch').html("");
   
  					 $.post("<?php echo $this->Html->url(array('action'=>'subcategory_fetcher')); ?>",{'id':c},function(resp)
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
    			
    			var u=$("#usr").val();
				var c=$("#ca").val();
				var s=$("#su").val();
				var p=$("#pro").val();
    	$.post("<?php echo $this->Html->url(array('action'=>'searchin'));?>",{'ajx':'category','userid':u,'catid':c,'subcat':s,'product':p},function(resp)
    	{
    	//alert(resp);
    		if(resp==0)
            {
                alert("Sorry!! not fetched");
            }
            else
                {
                	$('#srch').html(resp);
                   
                }
    	});
    });
    $('#su').change(function(){
   				 $('#srch').html("");
    			var u=$("#usr").val();
				var c=$("#ca").val();
				var s=$("#su").val();
				var p=$("#pro").val();
    			//alert(u);
    			$.post("<?php echo $this->Html->url(array('action'=>'searchin')); ?>",{'ajx':'subcategory','userid':u,'catid':c,'subcat':s,'product':p},function(resp)	{
    			//alert(resp);
    			$('#srch').html(resp);
    	});
    		});
    		$('#pro').keyup(function(){
    			 $('#srch').html("");
    			var u=$("#usr").val();
				var c=$("#ca").val();
				var s=$("#su").val();
				var p=$("#pro").val();
    			
    			//alert(u);
    			$.post("<?php echo $this->Html->url(array('action'=>'searchin')); ?>",{'ajx':'subcategory','userid':u,'catid':c,'subcat':s,'product':p},function(resp)	{
    			//alert(resp);
    			$('#srch').html(resp);
    	});
    		});
    });



</script>
<div style="float:left;">
<span style="text-align:center;color:blue;font-size:25px">Advanced Search</span>
<?php 
echo	$this->Form->create('Search',array('inputDefaults'=>array('div'=>false,'label'=>false)));
?>
<div><label>UserName</label>
<div><?php
echo $this->Form->select('uname',$usr,array('empty'=>'-select-','id'=>'usr' )); 
?>
</div>
</div>
<div><label>Category Name</label>
<div><?php
 echo $this->Form->select('Category.name',$cat,array('empty'=>'-select-','id'=>'ca')); ?>
</div>
</div>
<div><label>SubCategory</label>
<div><?php
 
echo $this->Form->input('Sub',array('empty'=>'-select-','id'=>'su','type'=>'select')); 
?>
</div>
</div>
<div><label>Product</label>
<div><?php
echo $this->Form->input('product',array('id'=>'pro','type'=>'text'));
echo	$this->Form->end();
?>

<table id="srch" border="1px" cellpadding="5px" cellspacing="1px">
  


</table>
</div>
