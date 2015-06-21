<?php $this->Html->script('jQuery');?><div style="float:left;width:25%;height:70%;border:1px solid black;position:relative;" id="messenger_wrapper">
	<div style="background-color:orange ;width:100%;">
	<div id="messenger_header" style="height:20%;width:60%;margin:auto;position:relative">
		<font color="orangered">
		
			<p style="text-align:center;margin-top:10%;font-size:20">ChatBuddy.com</p>
		</font>
	</div>
	</div>
	<div style="margin-top:10%;"><p ><label id="stat"></label></p>
		<script>
				function func(event)
				{
					if(event.keyCode==13)
					{
						var a=document.getElementById("status").value;
						
					}
				}
				
				 
		</script>
			
		 
	</div>
	<div style="margin-top:10%;margin-left:5%;">
		<p><input type="text" placeholder="status" id="status" width=100% onkeypress="func(event);" /></p>
	</div>
	<div style="margin:5%;margin-left:8%;">
		<ul style="font-size:20" >
		<?php foreach($posts as $post)
		{
		?>
			<li><?php echo $post['User']['username']; 
			echo $this->Html->link('start Convo',array('controller'=>'Users','action'=>'convo',$post['User']['id'],$post['User']['username']));
			?></li>
		<?php 	}?>
			
	</div>
	<?php
              	
        echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled'));
		echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled'));
		echo $this->Paginator->counter();

?>
</div>

		
