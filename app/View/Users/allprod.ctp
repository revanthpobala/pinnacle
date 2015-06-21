


<?php echo $this->Html->script('jQuery'); ?>
<script>
    $(document).ready(function(){
	
	$('#idd').hide();
	
	
	
	$(document).click(function(){
	$('#idd').slideUp();
	});
	$("#catid").change(function(){
		 var v=$(this).val(); 
		$.post("/aasthab/pinnacle/Users/subcategory_fetcher/",{'id':v},function(resp)
            			{		alert(resp);
            			});
	
	});
 $(".det").click(function(){
		
		
			
			var v=$(this).attr('value');
			
			$.post("<?php echo $this->Html->url(array('controller'=>'users','action'=>'detail_yo')); ?>",{'id':v},function(response){
				resp=JSON.parse(response);
				//alert(resp);
				$('#idd').fadeIn();
				$('#t').html('');
				for(x in resp){
					if(typeof(resp[x]=='object'))
					{
						//alert(x);
						//alert(resp[x]);
							if(x=='image')
							{
								$('#t').append('<tr><td> '+x+':</td><td><img src="../products/'+resp[x]+'"></img></td></tr>');
							}
							else
							{
								$('#t').append('<tr><td> '+x+':</td><td>'+resp[x]+'</td></tr>');
							}
						
						}
					}
				
				
				});
				});
    var amt=0;
    var cnt=0;
    var flag=0;
    		var cart={};
    
    	 $('.pur').click(function()
    		{ 
    					var flag=$(this).attr('flag');
    						alert(flag);
    					cart[cnt]=$(this).val();
    					//alert(cnt);
       					//alert(cart[cnt]);
       					$(this).text('Remove');
       					aa=cart[cnt];
       			if(flag==0)
       			{
       				$(this).attr('flag','1');
       				alert("added");
       				$.post("/aasthab/pinnacle/Users/purchase/",{'cart':aa,'count':cnt},function(resp)
            			{		//alert(resp);
            				resp=JSON.parse(resp);
            				amt=amt+parseInt(resp['Product']['price']);
            				//var obj = $.parseJSON(resp);
            		//alert('<?php echo $this->Session->read('total'); ?>');
            		//alert(amt);
            		$('.show').append("<tr><td>"+resp['Product']['name']+" </td><td>"+resp['Product']['price']+"</td></tr>");
            		 $('.add').html("Total amount= Rs.<b><font color='orangered'> "+amt+"</font></b>");	
            });
            }
            else{
            $(this).attr('flag','0');
            alert("deleted");
            $(this).text('Add To Cart');
            $.post("/aasthab/pinnacle/Users/unpurchase/",{'cart':aa,'count':cnt},function(resp)
            			{		alert(resp);
            			});
            
            }
            
           
});});


</script>



<div>
<table border=1px cellspacing=5px cellpadding=5px>
<tr>
	<th>PImage</th>
	<th>Product Name</th>
	<th>Category Name</th>
	<th>Detail</th>
	<th>Action</th>
</tr>
<?php $cnt=1; 
foreach($data as $post): ?>
<tr>
    <td>
						<?php echo $this->Html->image("/products/".$post['Product']['image'],array('width'=>'50px','height'=>'50px'));?>
						</td>
			<td><?php echo $post['Product']['name'];?>
						</td>
						
						<td><?php echo $post['Category']['name'];?>
						</td>
						<td><?php echo $this->Html->Link('detail','javascript:void(0)',array('class'=>'det','value'=>$post['Product']['id']))?></td>
						
						
				       
				
      <td><?php 
        echo $this->Form->button('Add To Cart',array('class'=>'pur','id'=>'pur'.$cnt++,'value'=>$post['Product']['id'],'flag'=>'0')); 
        echo $this->Html->image("/buycart/buycart.png");?>
       </td>
     </tr>
    <?php  endforeach; ?>
    <?php unset($post);  ?>
    <table>
    </div>
    <div class="show" style="width:80%;border:1px solid black;">
    <tr>
    </tr>
    
    </div>
    <div class="add">
    			
    </div>
    </table>
</table>
<?php
              	
        echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled'));
		echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled'));
		echo $this->Paginator->counter();

?>
<div style="position:absolute;top:225px;left:390px;background-color:rgba(5,8,10,0.8)" class='iddd' id="idd">
			<table id="t" style="color:whitesmoke;padding:10px;margin:10px">
			</table>
			</div>
        
