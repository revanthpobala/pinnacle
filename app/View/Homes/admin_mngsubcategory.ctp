
<?php echo $this->html->script('jQuery'); ?>
<script>
    
    $(document).ready(function()
    {
        $('.del').click(function()
    { 
       //alert("sam");
        var v=$(this).attr('value'); //alert(v);
        var s=$(this).attr('id');//alert(s);
        $.post("/aasthab/pinnacle/Homes/delete/",{'id':v,'delid':s},function(resp)
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
    });
    </script>
    <div class="right-panel-in">
<div class="row">
<?php echo $this->Form->create('Category'); ?>
			<div id="admin_left" style="margin-left:-100px;height:75%;float:right;">
				<?php echo $this->Form->input('search',array('placeholder'=>'SEARCH','label'=>false,'div'=>false))?>
				<?php echo $this->Form->submit('Search',array('div'=>false))?>
</div>
</div>
<table>
    <tr>
        <th>S.No.</th>
        <th>Sub-Category Name</th>
        <th>Category Name</th>
	<th>Created</th>
	<th>Modified</th>
    </tr>
  	<?php 
     $cnt=1;
    foreach ($posts as $post): ?>
    <tr>
       
        <td><?php 
        echo $post['Category']['id']; ?></td>
        <td>
            <?php echo $post['Category']['name']; ?>
        </td>
         <td>
            <?php echo $post['SubCategory']['name']; ?>
        </td>
        <td>
            <?php echo $post['Category']['created']; ?>
        </td>
        <td>
            <?php echo $post['Category']['modified']; ?>
        </td>
        <td><?php echo $this->Html->link('edit',array('controller'=>'Homes','action'=>'edit',$post['Category']['id'])); ?>
         ||<?php  echo $this->Html->link('delete','javascript:void(0);',array('class'=>'del','id'=>'del'.$cnt++,'value'=>$post['Category']['id'])); ?>  
     </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
<?php echo $this->Html->link('Add Sub Product',array('controller'=>'Homes','action'=>'admin_addscat')); ?>
