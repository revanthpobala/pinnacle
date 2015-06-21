

<?php  echo $this->Html->script('jQuery');?>

<script>
		$(document).ready(function()
		{
		
			$(".del").click(function()
			{
					var v=$(this).attr('value');// alert(v);
       				var s=$(this).attr('id');//alert(v);
					
					$.post("/aasthab/pinnacle/Users/delconvo",{'id':v,'delid':s},function(resp)
					{	
						resp=resp.trim();
                    	var m="#"+resp;
						$(m).closest('td').closest('tr').hide();
					});
			});
			$("#send").click(function()
				{
					var msg=$("#msg").val();
					var rcvr=$(this).val();
					//alert(msg);
					$.post("/aasthab/pinnacle/Users/conversation",{'msg':msg,'rcvr':rcvr},function(resp)	
					{
					
						$("tr:nth-child(1)").append('<br>'+"<tr><td>"+msg+"</td><td>"+"<button>Delete Me</button></td></tr>");
					});
				});
			
		});
	</script>

 
 <div id="content" style="width:40%;top:50%;">
	<?php 
		
		echo $this->Form->create('Chat');
		echo $this->Form->input('message',array('id'=>'msg','type'=>'textarea',
		'style'=>'position:absolute;height:30%;width:20%;left:43%;top:70%','label'=>false));
		echo $this->Form->Button('Send',array('id'=>'send','value'=>$id,'style'=>'position:absolute;left:60%;top:100%'));http://192.168.0.240:8004/aasthab/pinnacle/searches/cms
		echo $this->Form->end();
		
	?>
	</div>
	<?php
		$data=$this->requestAction(array(
   			 'controller' => 'Users',
   			 'action'=> 'mmsgg',
  			  $id
  			  )
  			  );
  		
	?>
	<div style="border:1px solid black;top:60%;width:30%;">
	<table  border=1>
		<tr>
			<th>Sender Name</th>
			<th>Receiver Name</th>
			<th>Messages</th>
			<th>Action On Messages</th>
		</tr>
		<?php
			$sno=1;
			foreach($data as $dat): 

		//	pr($dat);die;
			?>
			<tr >
				<td><?php echo $dat['Sender']['username'];?></td>
				<td><?php echo $this->Session->read('rname');?></td>
				<td><?php echo $dat['Message']['message'];?></td>
   				 <td><?php echo $this->Form->Button('Delete Me',array('class'=>'del','id'=>'del'.$sno++,'value'=>$dat['Message']['id']));?>
   				 </td>
   			</tr>
   		  	<?php  endforeach; ?>
  		  	<?php unset($dat);?>
	</table>
	
	</div>
</div>

