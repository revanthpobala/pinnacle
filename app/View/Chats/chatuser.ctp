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
						document.getElementById("stat").innerHtml=a;
					}
				}
				
				 
		</script>
			
		 
	</div>
	<div style="margin-top:10%;margin-left:5%;">
		<p><input type="text" placeholder="status" id="status" width=100% onkeypress="func(event);" /></p>
	</div>
	<div style="margin:5%;margin-left:8%;">
		<ul style="font-size:20" >
		<?php foreach($posts as $post){?>
			<li><?php echo $post['Chat']['name']; 
			echo $this->Html->link('Start Convo',array('controller'=>'Chats','action'=>'convo',$post['Chat']['name']));
			?></li>
		<?php 	}?>
			
	</div>
</div>

		
