
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
<h2 class="title">Your Category
</div>

<table>
    <tr>
        <th>S.No.</th>
        <th>Category Name</th>
        <th>Status</th>
        <th>Created</th>
	<th>Modified</th>
	<th>Action</th>
    </tr>
  	<?php 
     $cnt=1;
    foreach ($usr as $pos):
    //	if($pos['User']['status']!=1)
    	//	{
     ?>
    <tr>
       
        <td><?php 
        echo $post['User']['id']; ?></td>
        <td>
            <?php echo $post['User']['name']; ?>
        </td>
        
         <td>
            <?php echo $post['User']['email']; ?>
        </td>
         <td>
            <?php echo $post['User']['created']; ?>
        </td>
         <td>
            <?php echo $post['User']['modified']; ?>
        </td>
        <td><?php echo $this->Html->link('edit',array('controller'=>'Homes','action'=>'/edit',$post['User']['id'])); ?>
         ||<?php  echo $this->Html->link('delete','javascript:void(0);',array('class'=>'del','id'=>'del'.$cnt++,'value'=>$post['User']['id'])); ?>  
     </tr>
    <?php// }
    endforeach; ?>
    <?php unset($post); ?>
</table>

