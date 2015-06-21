
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
<?php echo $this->Form->create('User'); ?>
			<div id="admin_left" style="margin-left:-100px;height:75%;float:right;">
				<?php echo $this->Form->input('search',array('placeholder'=>'SEARCH','label'=>false,'div'=>false))?>
				<?php echo $this->Form->submit('Search',array('div'=>false))?>
				</div>
</div>

<table>
    <tr>
        <th>S.No.</th>
        <th>User Name</th>
         <th>Email</th>
        <th>Status</th>
        <th>Created</th>
	<th>Modified</th>
	<th>Action</th>
    </tr>
  	<?php 
     $cnt=1;
    foreach ($usr as $pos):
   
     ?>
    <tr>
       
        <td><?php 
        echo $pos['User']['id']; ?></td>
        <td>
            <?php echo $pos['User']['username']; ?>
        </td>
        
         <td>
            <?php echo $pos['User']['email']; ?>
        </td>
         <td>
            <?php echo $pos['User']['created']; ?>
        </td>
         <td>
            <?php echo $pos['User']['modified']; ?>
        </td>
        <td><?php echo $this->Html->link('edit',array('controller'=>'Homes','action'=>'/useredit',$pos['User']['id'])); ?>
         ||<?php  echo $this->Html->link('delete','javascript:void(0);',array('class'=>'del','id'=>'del'.$cnt++,'value'=>$pos['User']['id'])); ?>  
     </tr>
    <?php
    endforeach; ?>
    <?php unset($post); ?>
</table>

