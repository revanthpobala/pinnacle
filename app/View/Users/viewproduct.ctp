<div id="content">
<?php echo $this->html->script('jQuery'); ?>
 <?php echo $this->Html->script('jquery');?>
   <?php echo $this->Html->script('jquery-1.10.2.min');?>
   <?php echo $this->Html->script('lightbox-2.6.min');?>
   <?php echo $this->Html->css('lightbox'); ?>
   
<script>
    
    $(document).ready(function()
    {
        $('.del').click(function()
    { 
       //alert("sam");
        var v=$(this).attr('value'); //alert(v);
        var s=$(this).attr('id');//alert(s);
        $.post("/aasthab/pinnacle/Users/deletepro/",{'id':v,'delid':s},function(resp)
             {
             	//alert(resp);
       if(resp==0)
            {
                alert("Sorry!! not deleted");
            }
            else
                {
                	resp=resp.trim();
                    var m="#"+resp;
                    $(m).closest('tr').hide();
                }
    });
    });
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
    <?php if(!empty($rows))
   {?>
<table border="1px" cellpadding="5px" cellspacing="1px">
    <tr>
    	<th>Image</th>
        <th>Product</th>
		 <th>Category</th>
		 <th>Sub-Category</th>
		 <th>Price</th>
       <th>Action</th>
    </tr>

  <span style="font-size:23px">
    <?php //pr($rows);
   
    echo   $this->Html->link('Back to home',array('action'=>'index'));; ?></span><?php 
    $sno=1;
    $cnt=0;
   
    foreach ($rows as $post):
    
     if($post['Product']['status']==0)
     {
 // pr($rows2);die;
    ?>
    <tr>
    <td>
    <?php
echo $this->Html->link(
    $this->Html->image("/products/".$post['Product']['image'], array('width'=>'50px','height'=>'50px')),
    "/products/".$post['Product']['image'],
    array('data-lightbox'=>"/products/".$post['Product']['image'],'escape' => false)
);

?></td>
   <!-- <td>
						<?php echo $this->Html->image("/products/".$post['Product']['image'],array('width'=>'50px','height'=>'50px'));?>
						</td>-->
			<td><?php echo $post['Product']['name'];?>
						</td>
						
						<td><?php echo $post['Category']['name'];?>
						</td>
						
						<td><?php echo $rows2[$sno]['0']['SubCategory']['name'];?>
						</td>
						<td><?php echo $post['Product']['price'];?>
						</td>
				       
				
      <td><?php echo $this->HTML->link('Edit',array('controller'=>'Users','action'=>'editprod',$post['Product']['id'])); 
      echo "||";
        echo $this->Form->button('delete',array('class'=>'del','id'=>'del'.$cnt
                ++,'value'=>$post['Product']['id'],'controller'=>'Users','action'=>'deletepro')); ?>  
       </td>
     </tr>
    <?php $sno++; } endforeach;
 
     ?>
    <?php unset($post); } 
    else echo "<h1 style='color:orange'>Sorry You havnt added any product</h1>";?>
</table>
        
</div>
    
